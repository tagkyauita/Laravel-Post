<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show()
    {
        $user = User::find(1);
        return view('users.users')->with('user', $user);
    }
}
