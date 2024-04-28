<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function allevents(){
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.allevents", compact('userEvents'));
    }
    public function Concerts_Festival(){
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.Concerts&Festival", compact('userEvents'));
    }
    public function Conference(){
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.Conference", compact('userEvents'));
    }
    public function Spor(){
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.Spor", compact('userEvents'));
    }
    public function Théâtre_Humour(){
        $user = auth()->user();
        $userEvents = $user->events;
        return view("home.categorie.Théâtre&Humour", compact('userEvents'));
    }
}
