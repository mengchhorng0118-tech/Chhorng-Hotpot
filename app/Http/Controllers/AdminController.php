<?php

namespace App\Http\Controllers;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', ['title' => 'Admin Dashboard']);
    }
    public function dashboard(){
        $orders = Order::latest()->get();
        return view('admin.dashboard',compact('orders'));
    }
}
