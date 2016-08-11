<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

use App\User;

class AdminController extends Controller
{

    /**
    * List Users
    */
    public function index()
    {
        $users = User::all();
        return view('admin.usersList', compact('users'));
    }

    /**
    * Create User
    */
    public function create()
    {
        return view('admin.create');
    }

    /**
    * Create a new user
    *
    * @param  $data
    * @return Redirect to admin home page
    */
    protected function store(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return redirect('admin');
    }

    /**
    * Update User
    *
    * @param  $data
    */
    public function update(Request $data)
    {
        $user = User::find($data->id);
        return view('admin.update', compact('user'));
    }

    /**
    * Edit User data
    *
    * @param  $data
    */
    public function edit(Request $data)
    {

        $v = Validator::make($data->all(), [
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $user = User::find($data->user_id);
        $user->name = $data->name;
        $user->email = $data->email;
        $user->status = $data->status;
        if($data->password)
        {
            $user->email = bcrypt($data->password);
        }
        $user->save();
        return redirect('admin');
    }

    /**
    * Delete User
    *
    * @param  $data
    */
    public function delete(Request $data)
    {
        User::destroy($data->id);
        return redirect('admin');
    }
}
