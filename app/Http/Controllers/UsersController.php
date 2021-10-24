<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('users.show')->with('user', $user);
    }

    public function edit($id) 
    {
        $user = User::findOrFail($id);
        
        if (Auth::id() == $user->id){
            return view('users.update')->with('user', $user);
        }

        return back()->with('error', '許可されていない操作です');
    }

    public function update($id, Request $request) 
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(),[
                'name'=>'required|string|max:255',
                'email'=>[
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
                'password'=>'sometimes|nullable|string|min:8|confirmed',
        ]);
        
        if (Auth::id() == $user->id) {
            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            } else {
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                if (!empty($request->password)) {
                    $user->password = Hash::make($request->password);
                }
                $user->save();
                return view('users.show', compact('user'));
            }
        } 
        return back()->with('error', '許可されていない操作です');
        
    }
}
