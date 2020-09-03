<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \App\Goal;
use \App\Step;
use \App\Reason;
use Carbon\Carbon;

class GoalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $q = \Request::query();

        if(isset($q['name'])){


            if($q['name'] === 'inportance'){

                $goals = Auth::user()->goals()->where('achievement', 0)->orderBy('how_important','desc')->get();

            }else if($q['name'] === 'urgent'){

                $goals = Auth::user()->goals()->where('achievement', 0)->orderBy('how_urgent','desc')->get();

            }else if($q['name'] === 'when'){

                $goals = Auth::user()->goals()->where('achievement', 0)->orderBy('when','asc')->get();

            }

            return view('goal.index', compact('goals'));

        }else {

            $goals = Auth::user()->goals()->where('achievement', 0)->latest()->get();
            return view('goal.index', compact('goals'));

        }
        
    }

    public function show(Goal $goal)
    {
        $auth = Auth::user();

        if($goal->user_id === $auth->id){

            $steps = $goal->steps()->get();
            $reasons = $goal->reasons()->get();

            $howManySteps = count($steps);
            
            $startDay = new Carbon($goal->create_at);
            $finishDay = new Carbon($goal->when);
            
            // スタートから達成までの日数
            $totalDay = $startDay->diffInDays($finishDay);

            // １ステップ分の日数
            $oneStepDay = floor($totalDay / $howManySteps);

            // ステップごとの日付を配列に代入
            $stepDays = [];
            for($i = 0; $i < $howManySteps; $i++){
                $stepDate = $startDay->addDays($oneStepDay);
                $stepDay = $stepDate->format('Y / m / d');   //←ここで変換しないでCarbonのままだと予期しない動きになる
                array_push($stepDays, $stepDay);
            }

            // Vue.jsで各ステップが達成済みか判断するための変数を定義
            $defaultCompleted = [];
            foreach ($steps as $step) {

                if($step->achievement === 0){
                    array_push($defaultCompleted, false);
                } else {
                    array_push($defaultCompleted, true);
                }
            }

            $today = new Carbon();
            $leftDay = $today->diffInDays($finishDay);

            return view('goal.show', compact('auth', 'goal', 'reasons', 'howManySteps', 'steps', 'stepDays', 'defaultCompleted', 'today', 'leftDay'));

        }else{

            return redirect('/');

        }
        
    }

    public function create()
    {

        $today = Carbon::now()->format('Y-m-d');
        return view('goal.create', compact('today'));

    }

    public function store(Request $request)
    {
        
        $request->how_important = (int)$request->how_important;
        $request->how_urgent = (int)$request->how_urgent;

        $validator = $request->validate([

            'what' => ['required', 'string'],
            'when' => ['required'],
            'how_important' => ['required', 'min:1', 'max:10'],
            'how_urgent' => ['required', 'min:1', 'max:10'],
            'why1' => ['nullable', 'string'],
            'why2' => ['nullable', 'string'],
            'why3' => ['nullable', 'string'],
            'why4' => ['nullable', 'string'],
            'why5' => ['nullable', 'string'],
            'step1' => ['nullable', 'string'],
            'step2' => ['nullable', 'string'],
            'step3' => ['nullable', 'string'],
            'step4' => ['nullable', 'string'],
            'step5' => ['nullable', 'string'],
            'step6' => ['nullable', 'string'],
            'step7' => ['nullable', 'string'],
            'step8' => ['nullable', 'string'],
            'step9' => ['nullable', 'string'],
            'step10' => ['nullable', 'string'],

        ]);

        $allReasons = [$request->why1, $request->why2, $request->why3, $request->why4, $request->why5];

        $reasons = [];
        foreach ($allReasons as $reason) {

            if($reason != ""){
                array_push($reasons, $reason);
            }
        }

        $allSteps = [$request->step1, $request->step2, $request->step3, $request->step4, $request->step5 , $request->step6, $request->step7, $request->step8, $request->step9, $request->step10];

        $steps = [];
        foreach ($allSteps as $step) {

            if($step != ""){
                array_push($steps, $step);
            }
        }
        
        $goal = new Goal;
        $goal->user_id = Auth::user()->id;
        $goal->what = $request->what;
        $goal->when = $request->when;
        $goal->how_important = $request->how_important;
        $goal->how_urgent = $request->how_urgent;
        
        $goal->save();

        foreach ($steps as $s) {

            $step = new Step;
            $step->step = $s;
            $step->goal_id = $goal->id;

            $step->save();
        }

        foreach ($reasons as $r) {

            $reason = new Reason;
            $reason->reason = $r;
            $reason->goal_id = $goal->id;

            $reason->save();
        }

            // 二重送信対策
        $request->session()->regenerateToken();

        $goals = Auth::user()->goals()->latest()->get();
        return view('goal.index', compact('goals'));
        
    }

    public function achieve($id)
    {
        $goal = Goal::find($id);

        if($goal->achievement === 0){

            $goal->achievement = 1;
            $goal->save();

            return redirect('/');

        }else{

            return redirect('/');

        }
    }

}
