<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    //
    public function allevents()
    {
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.allevents", compact('userEvents'));
    }
    public function Concerts_Festival()
    {
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.Concerts&Festival", compact('userEvents'));
    }
    public function Conference()
    {
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.Conference", compact('userEvents'));
    }
    public function Spor()
    {
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.Spor", compact('userEvents'));
    }
    public function Théâtre_Humour()
    {
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.Théâtre&Humour", compact('userEvents'));
    }

    public function destroy(Calendar $event)
    {
        // Retrieve all UserEvents associated with the Calendar event
        $userevent = UserEvent::where('calendar_id', $event->id)->first();

        // Loop through each UserEvent and delete it
        // foreach ($userevents as $userevent) {
            $userevent->delete();
        // }

        // Redirect to a route after deletion
        return redirect()->route('home');
    }
}
