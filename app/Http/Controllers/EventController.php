<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Event;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;

class EventController extends Controller
{
    //


    public function index(){
        $user = User::where("id" , auth()->user()->id)->first();
        $events = Calendar::where("user_id" , auth()->user()->id)->get();

        return view('admin.event', compact('user', 'events'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'date' => 'required',
            'localisation' => 'required',
            // 'image' => 'required',
            'categorie' => 'required',
            'description' => 'required', 
            'user_id' => 'required', 
            // "users" => "required|array"
        ]);
        
        // dd($request);
        

        $event = Event::create([
            'name' => $request->name,
            'date' => $request->date,
            'localisation' => $request->localisation,
            // 'image' => $request->image,
            'categorie' => $request->categorie,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);
        
        return redirect(route('dashboard', absolute: false));
    }

    public function buy(Request $request, Event $event)
    {
        $user = Auth::user(); // Get the authenticated user

        // Check if the user already has bought the event
        if ($user->events()->where('event_id', $event->id)->exists()) {
            return back()->with('error', 'You have already bought this event.');
        }

        // Attach the event to the user
        $user->events()->attach($event->id);

        return back()->with('success', 'Event purchased successfully!');
    }

    public function show(Calendar $event){
        $showEvents = Calendar::where("id" , $event->id)->get();
        return view('home.event', compact('showEvents'));
    }

    public function session(Request $request, $eventId){
        // dd($eventId);
        if (!Auth::check()) {
        // Handle unauthenticated user (e.g., redirect to login page)
        return redirect()->route('login');
    }

    $user = Auth::user();
        if (!$user->events()->where('calendar_id', $eventId)->exists()) {
            // return back()->with('error', 'You have already bought this event.');
            $user->events()->attach($eventId);
        }




        Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            "name" => $request->name,
                            "description"=> $request->description
                        ],
                        'unit_amount'  => $request->price, // amount should be in cents
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment', // the mode  of payment
            'success_url' => route('success'), // route when success 
            'cancel_url'  => route('home'), // route when  failed or canceled
        ]);

        return redirect()->away($session->url);
    }
    

}
