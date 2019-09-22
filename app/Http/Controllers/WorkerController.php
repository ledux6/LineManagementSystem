<?php

namespace App\Http\Controllers;

use App\Duration;
use App\Line;
use App\User;
use Carbon\Carbon;
use DateInterval;
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
        $user = User::find($id);
        $user->serviced = 1;
        $user->save();
        $lines = Line::all();
        try {
            $interval = $user->updated_at->diff($user->created_at);
        } catch (\Exception $e) {
        }
        $time = $interval->format('%H:%I:%S');

        DB::table('durations')->insert(
            ['user_id'=> $id, 'line_id'=> $user->line_id, 'time_elapsed' => $time ]
        );
        return view('scoreboard/scoreboard', ['lines' => $lines]);
    }
}
