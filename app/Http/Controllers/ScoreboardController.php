<?php

namespace App\Http\Controllers;

use App\Line;

class ScoreboardController extends Controller
{
    public function index(){
        $lines = Line::all();
        return view('scoreboard/scoreboard', ['lines' => $lines]);
    }
}
