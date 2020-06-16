<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        return view('admin.dashboard');
    }

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

    public function viewOrder()
    {
        $orders = Order::all();
        return view('admin.customerorder')->with('orders', $orders);
    }

    public function editOrder(Request $request, $id)
    {
        $orders = Order::findOrFail($id);
        return view('admin.customerorder-edit')->with('orders', $orders);
    }

    public function updateOrder(Request $request, $id)
    {
        $orders = Order::find($id);

        $orders->user->name = $request->input('name');
        $orders->user->email = $request->input('email');
        $orders->user->street = $request->input('street');
        $orders->user->state = $request->input('state');
        $orders->user->postal_code = $request->input('postal_code');
        $orders->user->phone = $request->input('phone');

        $orders->user->save();

        return redirect('/orders-list')->with('status', 'Order succesfully updated');
    }

    public function removeOrder(Request $request, $id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();

        return redirect('/orders-list')->with('status', 'Order succesfully removed');
    }
}
