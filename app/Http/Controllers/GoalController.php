<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function index()
    {
        return view('goal.index');

    }

    public function create()
    {
        return view('goal.create');
    }

    public function createsecond()
    {
        return view('goal.createsecond');
    }
}
