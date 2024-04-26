<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $events = Calendar::all();
        // $user = User::where("id" , auth()->user()->id)->first();
        return view('home.home', compact('events'));
    }
}
