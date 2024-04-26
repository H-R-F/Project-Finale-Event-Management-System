<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $events = Calendar::where("user_id" , auth()->user()->id)->get();
        return view("admin.calendar", compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $user = auth()->user();

        request()->validate([
            "image" => "required|mimes:png,jpg,webp|max:2048"
        ]);

        $image = $request->file("image");
        $imageName = time() . "_" . $image->getClientOriginalName();
        $image->storeAs("public/img", $imageName);

        $data = [
            "name" => $request->title,
            "price" => $request->price,
            "dateStart" => $request->dateStart,
            "timeStart" => $request->timeStart,
            "dateEnd" => $request->dateEnd,
            "timeEnd" => $request->timeEnd,
            'localisation' => $request->localisation,
            'image' => $imageName,
            'categorie' => $request->categorie,
            'description' => $request->description,
            'user_id' => $user->id,
        ];

        Calendar::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        //

        $events = Calendar::where("user_id" , auth()->user()->id)->get()->map(function (Calendar $event) {
            $start = $event->dateStart . " " . $event->timeStart;
            $end = $event->dateEnd . " " . $event->timeEnd;
            return [
                "start" => $start,
                "end" => $end,
                "title" => $event->name,
                "color" => "#14ff72cb",
            ];
        });

        return response()->json([
            "events" => $events
        ]);
    }


    public function update(Request $request, Calendar $event)
    {

        request()->validate([
            "title"=>"required",
            "price"=>"required",
            "localisation"=>"required",
            "description"=>"required",
            "Categorie"=>"Categorie",
            "dateStart"=>"required",
            "dateEnd"=>"required",
            "timeStart"=>"required",
            "timeEnd"=>"required",
        ]);

        $imageName = $event->image;
        if ($request->hasFile('image')) {
            Storage::disk("public")->delete("img/" . $event->image);
            $uploadedFile = $request->file("image");
            $imageName =  time() . "_" . $uploadedFile->getClientOriginalName();
            $uploadedFile->storeAs("public/img/" . $imageName);

        }
        $user = auth()->user() ;
        $event->update([

            "name" => $request->title,
            "price" => $request->price,
            "dateStart" => $request->dateStart,
            "timeStart" => $request->timeStart,
            "dateEnd" => $request->dateEnd,
            "timeEnd" => $request->timeEnd,
            'localisation' => $request->localisation,
            'image' => $imageName,
            'categorie' => $request->categorie,
            'description' => $request->description,
            'user_id' => $user->id,
        ]);

        

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Calendar $calendar)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $event)
    {
        //
        Storage::disk("public")->delete("img/" . $event->image);
        $event->delete();
        return back();
    }
}
