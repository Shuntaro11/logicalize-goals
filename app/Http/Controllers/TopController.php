<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    public function index()
    {
        if ( Auth::check() ) {

            $goals = Auth::user()->goals()->where('achievement', 0)->latest()->get();

            if(count($goals) != 0){

                return view('goal.index', compact('goals'));
                
            }else{
                
                return view('goal.create');
            }
            

        }else{

            return view('top');

        }
    }
}
