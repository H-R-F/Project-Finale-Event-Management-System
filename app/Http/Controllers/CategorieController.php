<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function allevents(){
        return view("home.categorie.allevents");
    }
    public function Concerts_Festival(){
        // $Concerts_Festival
        return view("home.categorie.Concerts&Festival");
    }
    public function Conference(){
        return view("home.categorie.Conference");
    }
    public function Spor(){
        return view("home.categorie.Spor");
    }
    public function Théâtre_Humour(){
        return view("home.categorie.Théâtre&Humour");
    }
}
