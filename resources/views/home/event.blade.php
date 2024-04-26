@extends('layouts.index')
@section('content')
<div class="w-full flex justify-center items-center p-4">
    <div class="w-[46vw] border-2 border-black p-4 rounded-md">
        @foreach ($showEvents as $showEvent)
            <div class="flex items-center justify-between gap-11">
                <img class="w-[25rem] h-[20rem]" src="{{ asset('storage/img/' . $showEvent->image) }}" alt="">
                <div>
                    <div class="flex justify-between items-center w-[20vw] gap-x-3">
                        <h1 class="">{{ $showEvent->name }}</h1>
                        <h1>{{ $showEvent->price }} Dh</h1>
                    </div>
                    <h3 class="tex">Date Start: {{ $showEvent->dateStart }}</h3>
                    <h3>time Start: {{ $showEvent->timeStart }}</h3>
                    <div class="flex flex-col">
                        <h2>Description:</h2>
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

            <div class="flex justify-center items-center gap-3">
                @foreach ($events as $event)
                    @if ($event->categorie == $showEvent->categorie && $event->id != $showEvent->id)
                        <div class="flex flex-col justify-center items-center">
                            <div>{{ $event->name }} {{ $event->categorie }}
                                <img width="200" src="{{ asset('storage/img/' . $event->image) }}"
                                    alt="">
                            </div>
                            <form action="{{ route('event.show', $event) }}" method="POST">
                                @csrf
                                <button class="bg-[#14ff72cb] px-6 py-2 rounded-md">
                                    show
                                </button>
                            </form>
                        </div>
                    @endif
                @endforeach
            </div>

@endsection
