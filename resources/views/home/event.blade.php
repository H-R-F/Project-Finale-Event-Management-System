@extends('layouts.index')
@section('content')
    <div class="w-full flex justify-center items-center p-4">
        <div class="w-[46vw] border-2 border-black p-4 rounded-md">
            @foreach ($showEvents as $showEvent)
                <div class="flex items-center justify-between gap-11">
                    <img class="w-[25rem] h-[20rem]" src="{{ asset('storage/img/' . $showEvent->image) }}" alt="">
                    <div>
                        <div class="flex justify-between items-center w-[20vw] gap-x-3">
                            <h1 class="text-xl">{{ $showEvent->name }}</h1>
                            <h1 class="text-xl">{{ $showEvent->price }} Dh</h1>
                        </div>
                        <div class="flex gap-x-3">
                            <h3 class="text-sm">Date Start: {{ $showEvent->dateStart }}</h3>
                            <h3 class="text-sm">time Start: {{ $showEvent->timeStart }}</h3>
                        </div>
                        <div class="flex flex-col pb-9">
                            <h2 class="text-xl">Description:</h2>
                            <p class="card-text text-sm">{{ $showEvent->description }}</p>
                        </div>


                        <form action="{{ route('event.pay', $showEvent->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $showEvent->id }}">
                            <input type="hidden" name="name" value="{{ $showEvent->name }}">
                            <input type="hidden" name="price" value="{{ $showEvent->price }}">
                            <input type="hidden" name="description" value="{{ $showEvent->description }}">
                            <button class="btn btn-primary">Shop Now</button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div>
        
        <div class="flex flex-wrap justify-center items-center gap-3 p-4">
            @foreach ($events as $event)
            @if ($event->categorie == $showEvent->categorie && $event->id != $showEvent->id)
                    <form action="{{ route('event.show', $event) }}" method="POST">
                        @csrf
                        <button>
                            <div class="card" style="width: 25rem;">
                                <img class="w-[25rem] h-[20rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                                <div class="card-body px-4">
                                    <div class="flex flex-col gap-3">
                                        <div class="flex justify-between">
                                            <h3 class="">{{ $event->name }}</h3>
                                            <h3>{{ $event->price }} Dh</h3>
                                        </div>
                                        <div class="flex justify-between pb-3">
                                            <h3 class="tex">{{ $event->dateStart }}</h3>
                                            <h3>{{ $event->timeStart }}</h3>
                                        </div>
                                    </div>
                                    <p class="card-text text-sm">{{ $event->description }}</p>
                        </button>
                    </form>
                    @endif
                @endforeach
        </div>
    </div>

    @endsection
