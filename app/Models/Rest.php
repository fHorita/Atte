<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Rest extends Model
{
    use HasFactory;

    protected $guarded = array('id');


    public function getRestTime()
    {
        $restTables = Rest::all();
        // $totalStartTime = strtotime($this->start_time);
        // if($this->end_time) {
        //     $totalEndTime = strtotime($this->end_time);
        // } else {
        //     $totalEndTime = strtotime(0);
        // }
        $totalStartTime = 0;
        $totalEndTime = 0;
        foreach($restTables as $restTable) {
            if($this->attendance_id == $restTable->attendance_id) {
                $addStartTime = strtotime($restTable->start_time);
                if($restTable->end_time) {
                    $addEndTime = strtotime($restTable->end_time);
                } else {
                    $addEndTime = strtotime(0);
                }
                $totalStartTime +=  $addStartTime;
                $totalEndTime +=  $addEndTime;
            } 
        }

        $time = $totalEndTime - $totalStartTime;

        $hours = floor( $time / 3600 );
        $minutes = floor( ( $time / 60 ) % 60 );
        $seconds = $time % 60;

        if($time < 0) {
            $restTime = '休憩終了してない！';
        } else {
            $restTime = sprintf("%02s", $hours).":".sprintf("%02s", $minutes).":".sprintf("%02s", $seconds);
        }

        return $restTime;
    }

}