<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function signedup()
    {
        $users = User::all();
        return view('admin.signedup')->with('users', $users);
    }

    public function signedup_edit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.signedup-edit')->with('users', $users);
    }

    public function signedup_update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->phone = $request->input('phone');
        $users->user_level = $request->input('usertype');
        $users->email = $request->input('email');
        $users->update();

        return redirect('/userslist')->with('status', 'Data succesfully updated');
    }

    public function signedup_delete(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/userslist')->with('status', 'Data succesfully deleted');
    }
}
