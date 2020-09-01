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

        $goals = Auth::user()->goals()->latest()->get();
        return view('goal.index', compact('goals'));
        
    }

    public function show($id)
    {
        $goal = Goal::find($id);
        $auth = Auth::user();

        if($goal->user_id === $auth->id){
            $steps = $goal->steps()->get();
            $reasons = $goal->reasons()->get();
            return view('goal.show', compact('auth', 'reasons', 'steps'));
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

}
