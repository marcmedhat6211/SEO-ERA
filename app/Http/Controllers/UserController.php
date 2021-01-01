<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create() {
        $users = User::all();

        return view('users.create', [
            'users' => $users
        ]);
    }

    public function store(UserRequest $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
            'is_banned' => $request->is_banned,
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully');
    }

    public function edit($id) {
        $user = User::find($id);
        
        return view('users.edit')->with('user', $user);
    }

    public function update(UserRequest $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->password = $request->input('password');
        $user->is_admin = $request->input('is_admin');
        $user->is_banned = $request->input('is_banned');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User Updated successfully');
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted');
    }
}
