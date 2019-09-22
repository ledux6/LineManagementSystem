<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Line extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function average(){
        //implement later
        $times = DB::table('durations')->where('line_id', '=', $this->id)->get();
        $total = "00:00:00";
        $count = 0;
        foreach($times as $time) {
            $current = $time->time_elapsed;
            $total = strtotime($current) + (strtotime($total) - strtotime("00:00:00"));
            $count++;
        }
        $average = $total/$count;
        $string = date('i', $average);
        return $string;
    }
}
