<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Step;

class StepController extends Controller
{
    public function complete(Step $step)
    {
        $step->achievement = 1;
        $step->save();
        return response()->json([]);
    }

    public function cancelcomplete(Step $step)
    {
        $step->achievement = 0;
        $step->save();
        return response()->json([]);
    }
}
