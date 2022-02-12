<?php

namespace App\Http\Controllers;
// require __DIR__ . "/../vendor/autoload.php";

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Rest;
use Carbon\Carbon;
use Session;
use Illuminate\Pagination\Paginator;

class AttendanceController extends Controller
{

    
    public function getAttendanceStart()
    {
        $user = Auth::user();
        $oldAttendance = Attendance::where('user_id', $user->id)->latest()->first();

        if ($oldAttendance) {
            $oldAttendanceStart = new Carbon($oldAttendance->start_time);
            $oldAttendanceDay = $oldAttendanceStart->startOfDay();
        }

        $newAttendanceDay = Carbon::today('Asia/Tokyo');

        if ((isset($oldAttendanceDay) == $newAttendanceDay) && (empty($oldAttendance->end_time))){
            $text = 'すでに出勤打刻がされています';
            return view('stamp', ['text' => $text]);
        }

        $date = new Carbon('today');
        $date = $date->format('y-m-d');

        $Attendance = Attendance::create([
            'user_id' => $user->id,
            'start_time' => Carbon::now('Asia/Tokyo'),
            'date' => $date,
        ]);

        $text = Auth::user()->name . 'さんの出勤打刻が完了しました';
        return view('stamp', ['text' => $text]);
    }

    public function getAttendanceEnd()
    {
        $user = Auth::user();
        $Attendance = Attendance::where('user_id', $user->id)->latest()->first();

        if( !empty($Attendance->end_time)) {
            $text = 'すでに退勤打刻がされているか、出勤打刻がされていません';
            return view('stamp', ['text' => $text]);
        }
        $Attendance->update([
            'end_time' => Carbon::now('Asia/Tokyo')
        ]);

        $text = Auth::user()->name . 'さんの退勤打刻が完了しました';
        return view('stamp', ['text' => $text]);
    }




    public function getAttendanceView()
    {
        if (Session::has('date')) {
            $date = session()->get('date');
            $items = Attendance::where('date', $date)->paginate(5);
            return view('date', [
                'date' => $date, 
                'items' => $items,
            ]);
        } else {
            $date = new Carbon('today');
            $date = $date->format('y-m-d');
            Session::put('date', $date);
            $items = Attendance::where('date', $date)->paginate(5);
            return view('date', [
                'date' => $date,
                'items' => $items,
            ]);
        }   
    }

    public function getPreviousDay($message)
    {
        $date = new Carbon($message);
        $date = $date->subday()->format('y-m-d');
        return redirect('date')->with(compact('date'));
    }

    public function getNextDay($message)
    {
        $date = new Carbon($message);
        $date = $date->addday()->format('y-m-d');
        return redirect('date')->with(compact('date'));
    }

    
}
