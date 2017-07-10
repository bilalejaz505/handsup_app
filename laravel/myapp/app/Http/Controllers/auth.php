<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class auth extends Controller
{
    public function login(Request $request)
    {
        $users = new User();
        $email = $request->input('email');
        $user = $users->checkIfAlreadyExist($email);
        if ($user == true)
        {
            $request->session()->flash('status', 'Logged In Successfully');
            return redirect('users');
        }else{
            $request->session()->flash('status', 'Incorrect Email Entered');
            return redirect('/');
        }
        exit();
    }
}
