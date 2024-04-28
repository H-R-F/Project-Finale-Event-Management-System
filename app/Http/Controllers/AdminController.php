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

        // $user = auth()->user();
        // $userEvents = $user->events;

        // return view('admin.event', compact('user', 'events', 'userEvents'));

        if (auth()->check()) {
            $user = auth()->user();
            $userEvents = $user->events;
            return view('admin.event', compact('user', 'events', 'userEvents'));
        } else {
            // User is not authenticated
            return view('home.home', compact('events'));
        }
    }
}
