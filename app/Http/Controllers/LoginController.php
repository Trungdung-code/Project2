<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function process(Request $request)
    {
        try {
            $email = $request->get('email');
            $password = $request->get('password');
            $student = LoginModel::where('email', $email)->where('password', $password)
                ->firstOrFail();
            $request->session()->put('id', $student->idStudent);
            $request->session()->put('name', $student->name);
            $request->session()->put('dob', $student->dob);
            $request->session()->put('gender', $student->gender);
            $request->session()->put('email', $student->email);
            return Redirect::route('dashboard');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Sai ten tai khoan hoac mat khau');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
