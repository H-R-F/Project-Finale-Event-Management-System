<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEvent;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;

class EventController extends Controller
{
    //
    public function show(Calendar $event)
    {
        $showEvents = Calendar::where("id", $event->id)->get();
        $user = auth()->user();
        $userEvents = $user->events;

        return view('home.event', compact('showEvents', 'userEvents'));
    }

    public function session(Request $request, $eventId)
    {
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
                            "description" => $request->description
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
