<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
}
