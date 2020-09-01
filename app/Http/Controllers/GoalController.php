<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GoalController extends Controller
{
    public function index()
    {
        return view('goal.index');

    }

    public function create()
    {
        $today = Carbon::now()->format('Y-m-d');
        return view('goal.create', compact('today'));
    }

}
