<?php

namespace App\Http\Controllers;

use App\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function index(){
        $lines = DB::table('lines')->get();
        return view('addnewclient/register', ['lines' => $lines]);
    }

    public function add(Request $request){
        DB::table('users')->insert(
            ['name' => $request->name,
                'number' => $request->id,
                'line_id' =>$request->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        $lines = Line::all();
        return view('scoreboard/scoreboard', ['lines' => $lines]);

    }
}
