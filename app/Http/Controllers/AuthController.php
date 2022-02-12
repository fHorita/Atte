<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function getRegister()
    {
        return view('register');
    }

    
    public function create(Request $request)
    {
        $this->validate($request, User::$rules, [
            'name.required' => ':attributeは入力必須です',
            'email.required' => ':attributeは入力必須です',
            'password.required' => ':attributeは入力必須です',
            'password.min' => ':attributeは:min字以上で入力してください',
            'password.confirmed' => ':attributeが確認用パスワードと一致してません',
            'password_confirmation.requird' => ':attributeは入力必須です',
            'password_confirmation.min' => ':attributeは:min字以上で入力してください',
        ], [
            'name' => '名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => '確認用パスワード',
        ]);
        User::create([
            'name' => $request['name'], 
            'email' => $request['email'], 
            'password' => Hash::make($request['password']),
            'password_confirmation' => Hash::make($request['password_confirmation']),
        ]);
        $text = ['text' => '会員登録が完了しました'];
        return view('login', $text);
    }
    

    
    public function check(Request $request)
    {
        $text = ['text' => 'ログインして下さい。'];
        return view('login', $text);
    }

    public function checkUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
        'password' => $password])) {
            $text =  Auth::user()->name . 'さんお疲れ様です！';
        } else {
            $text = 'ログインに失敗しました';
        }
        return view('stamp', ['text' => $text]);
        $this->validate($request, User::$rules);
    }
    
    
    // public function check(Request $request)
    // {
    //     $text = ['text' => 'ログインして下さい。'];
    //     return view('login', $text);
    // }

    // public function checkUser(Request $request)
    // {
    //     $this->validate($request, User::$rules);
    //     $email = $request->email;
    //     $password = $request->password;
    //     if (Auth::attempt(['email' => $email,
    //             'password' => $password])) {
    //         $text =   Auth::user()->name .'さんお疲れ様です！';
    //     } else {
    //         $text = 'ログインに失敗しました';
    //     }
    //     return view('login', ['text' => $text]);
    // }

    public function getIndex()
    {
        $user = Auth::user();

        if ($user) {
            $text = Auth::user()->name .'さんお疲れ様です！';
            $param = ['user' => $user, 'text' => $text];
            return view('stamp', $param);
        } else {
            return redirect('login');
        }
    }

    protected function getLogout(Request $request) 
    {
        Auth::logout();
        return redirect('login');
    }
    
}