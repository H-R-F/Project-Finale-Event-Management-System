<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    // public function index(){
    //     return view('admin.admin');
    // }

    public function event(){
        $user = User::where("id" , auth()->user()->id)->first();
        $events = Calendar::where("user_id" , auth()->user()->id)->get();

        return view('admin.event', compact('user', 'events'));
    }
}
