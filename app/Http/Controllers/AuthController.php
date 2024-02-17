<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    public function login()
    {


        return view('login');

    }
    public function doLogin(LoginRequest $request)
    {

        $res = $request->validated();

        if(Auth::attempt($res)){
            $request->session()->regenerate();
            return redirect()->intended('./student');
        }else{
            return 'email or password invalid ';
        }

    }
    public  function inscrire()
    {
        return view('inscription');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté');
    }


}
