<?php

namespace App\Http\Controllers;

use App\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaitingController extends Controller
{
    public function index(){
        return view('waittime/waiting');
    }

    public function show(Request $request){
        $number = $request->get('number');
        $user = DB::table('users')->where('number','=', $number)->first();
        if($user == null){
            return view('waittime/waiting');
        }

        $line = Line::find($user->line_id);

        $count = 1;
        foreach($line->users as $user_in_line){
            if($user_in_line->serviced == 0){
                if($user_in_line->number == $user->number){
                    break;
                }
                else{
                   $count++;
                }
            }
        }
        $wait_time = $line->average() * $count;
        $string = date('i', $wait_time);

        return view('waittime/statistics', ['number' => $number, 'wait_time' => $wait_time]);
    }
}
