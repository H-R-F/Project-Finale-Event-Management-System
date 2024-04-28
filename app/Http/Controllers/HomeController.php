<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $events = Calendar::all();

        // // Assuming you want to fetch all events associated with the authenticated user
        

        // return view('home.home', compact('events', 'userEvents'));

        if (auth()->check()) {
            $user = auth()->user();
            $userEvents = $user->events;
            return view('home.home', compact('events', 'userEvents'));
        } else {
            // User is not authenticated
            return view('home.home', compact('events'));
        }
    }
}
