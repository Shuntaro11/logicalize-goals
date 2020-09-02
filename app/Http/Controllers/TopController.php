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
            return view('goal.index', compact('goals'));

        }else{

            return view('top');

        }
    }
}
