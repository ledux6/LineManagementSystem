<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function index(){
        $lines = DB::table('lines')->get();
        return view('addnewclient/register', ['lines' => $lines]);
    }

    public function add(Request $request){
        $id = DB::table('users')->max('id');
        if(isset($request->id) &&  isset($request->name)) {
            DB::table('users')->insert(
                ['name' => $request->name,
                    'number' => $request->id . "" . $id,
                    'serviced' => 0,
                    'line_id' => $request->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')]
            );
        }
        else{
            $lines = DB::table('lines')->get();
            $error = 'Įvyko klaida, kreipkitės telefonu';
            return view('addnewclient/register', ['lines' => $lines, 'error'=> $error]);
        }
        $lines = DB::table('lines')->get();
        $error = 'Užregistruota sėkmingai';
        return view('addnewclient/register', ['lines' => $lines, 'error'=> $error]);

    }
}
