@extends('layouts.profile_layout')
@section('content')
    <h1 class="text-center text-black">Your Events</h1>
    <div class="pt-4 flex justify-center items-center">
        <div class="flex flex-wrap gap-3">
        @foreach ($events as $event)
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
                <div class="flex gap-x-3 items-center justify-between w-32">
                    <button type="button" class="btn btn-primary w-[6rem] h-[3rem]" data-bs-toggle="modal" data-bs-target="#{{ $event->id }}">
                        edite
                    </button>
                    <form action="{{ route('event.destroy', $event) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger w-[6rem] h-[3rem]">Delete</button>
                    </form>
                </div>
            </div>
            @include("admin.components.modal_edite")
        </div>
            @endforeach
    </div>
@endsection
