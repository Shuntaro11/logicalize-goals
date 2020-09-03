<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TopController extends Controller
{
    public function index()
    {
        if ( Auth::check() ) {

            $goals = Auth::user()->goals()->where('achievement', 0)->latest()->get();

            if(count($goals) != 0){

                return view('goal.index', compact('goals'));

            }else{
                
                $today = Carbon::now()->format('Y-m-d');
                return view('goal.create', compact('today'));
            }
            

        }else{

            return view('top');

        }
    }
}
