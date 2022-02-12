<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function rests()
    {
        return $this->hasOne('App\Models\Rest');
    }

    public function getStartTime()
    {
        $startTime = date('H:i:s', strtotime($this->start_time));
        return $startTime;
    }

    public function getEndTime()
    {
        $endTime = date('H:i:s', strtotime($this->end_time));
        return $endTime;
    }

    public function getAttendanceTime()
    {
        $startTime = strtotime($this->start_time);
        $endTime = strtotime($this->end_time);
        $attendanceTime = $endTime - $startTime;

        if($this->rests) {
            $rest = $this->rests->getRestTime();
            $t = explode(":", $rest);
            $h = (int)$t[0];
            if (isset($t[1])) {
                $m = (int)$t[1];
            } else {
                $m = 0;
            }
            if (isset($t[2])) {
                $s = (int)$t[2];
            } else {
                $s = 0;
            }
            $restTime = ($h * 60 * 60) + ($m * 60) + $s;
        }

        if($this->rests) {
            $time = $attendanceTime - $restTime;
        } else {
            $time = $attendanceTime;
        }

        if($time>=0) {
            $hours = floor( $time / 3600 );
            $minutes = floor( ( $time / 60 ) % 60 );
            $seconds = $time % 60;
            $totalAttendanceTime = sprintf("%02s", $hours).":".sprintf("%02s", $minutes).":".sprintf("%02s", $seconds);
        } else {
            $totalAttendanceTime = '打刻エラー';
        }
        
        return $totalAttendanceTime;
    }


}