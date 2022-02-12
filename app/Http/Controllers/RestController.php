<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rest;
use App\Models\Attendance;
use Carbon\Carbon;

class RestController extends Controller
{
    public function getBreakStart()
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->latest()->first();
        $oldRest = Rest::where('attendance_id', $attendance->id)->latest()->first();

        if ($oldRest) {
            $oldRestStart = new Carbon($oldRest->start_time);
            $oldRestDay = $oldRestStart->startOfDay();
        }

        $newRestDay = Carbon::today('Asia/Tokyo');

        /**
         * 日付を比較する。同日付の休憩打刻で、かつ直前のRestの休憩打刻がされていない場合エラーを吐き出す。
         */
        if ((isset($oldRestDay) == $newRestDay) && (empty($oldRest->end_time))){
            $text = Auth::user()->name . 'さんは休憩中です';
            return view('stamp', ['text' => $text]);
        }

        
        $Rest = Rest::create([
            'attendance_id' => $attendance['id'],
            'start_time' => Carbon::now('Asia/Tokyo'),
        ]);


        $text = Auth::user()->name . 'さん、ゆっくりお休みください';
        return view('stamp', ['text' => $text]);
    }

    public function getBreakEnd()
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->latest()->first();
        $Rest = Rest::where('attendance_id', $attendance->id)->latest()->first();

        if( !empty($Rest->end_time)) {
            $text = '押し間違い？それとも休憩開始ボタン押し忘れ？';
            return view('stamp', ['text' => $text]);
        }
        $Rest->update([
            'end_time' => Carbon::now('Asia/Tokyo')
        ]);

        $text = 'さて、' . Auth::user()->name . 'さん、もう一仕事行きますか！';
        return view('stamp', ['text' => $text]);
    }

}
