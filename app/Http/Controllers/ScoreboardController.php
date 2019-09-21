<?php

namespace App\Http\Controllers;

use App\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreboardController extends Controller
{
    public function index(){
        $lines = Line::all();
        return view('scoreboard/scoreboard', ['lines' => $lines]);
    }
}
