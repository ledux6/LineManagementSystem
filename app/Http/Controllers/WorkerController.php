<?php

namespace App\Http\Controllers;

use App\Line;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerController extends Controller
{
    public function index(){
        $lines = Line::all();
        return view('workerpage/workerpage', ['lines' => $lines]);
    }

    public function line(Request $request){
        $users = Line::find($request->id)->users;
        return view('workerpage/linepage', ['users' => $users]);
    }

    public function remove(Request $request){
        $id = $request->get('id');
        User::destroy($id);
        $lines = Line::all();
        return view('scoreboard/scoreboard', ['lines' => $lines]);
    }
}
