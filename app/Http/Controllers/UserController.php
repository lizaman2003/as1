<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $r)
    {

        $validator = Validator::make($r->all(), [
            'name' => 'string|regex:/^([a-яА-ЯёЁ\s-]*)$/u',
            'surname' => 'string|regex:/^([a-яА-ЯёЁ\s-]*)$/u',
            'patronymic' => 'nullable|regex:/^([a-яА-ЯёЁ\s-]*)$/u',
            'login' => 'string|regex:/^([a-zA-Z0-9-]*)$/u|unique:App\Models\User,login',
            'email' => 'string|email:rfc|unique:App\Models\User,email|',
            'password' => 'string|min:6|same:password_repeat',
            'password_repeat' => 'string|min:6|same:password',
            'rules' => ''
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        User::create([
            'name' => $r->name,
            'surname' => $r->surname,
            'patronymic' => $r->patronymic,
            'login' => $r->login,
            'email' => $r->email,
            'password' => Hash::make($r->password),
        ]);
        return response()->json(['success' => 'success', 200]);
    }
    public function login(Request $r)
    {

        $validator = Validator::make($r->all(), [
            'login' => 'required|string',
            'password1' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if (Auth::attempt([
            'login' => $r->login,
            'password' => $r->password1
        ])) {
            if (Auth::user()->admin == 1) {
                return response()->json(['success' => 'admin'], 200);
            } else {
                return response()->json(['success' => 'success'], 200);
            }
            } else {
            return response()->json(['error' => 'error'], 401);
        }
    }

    public function admin()
    {
        
        return view('admin');
    }
    public function profile()
    {
        
        return view('profile');
    }
}
