@extends('layouts.index')
@section('content')
<h1 class="text-center text-black">Théâtre & Humour</h1>

<div class="flex flex-wrap justify-center items-center gap-3 p-4">
    @foreach ($events as $event)
        @if ($event->categorie == 'Théâtre & Humour')
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
                <form action="{{ route('event.show', $event) }}" method="POST">
                    @csrf
                    <button class="bg-[#14ff72cb] px-6 py-2 rounded-md">
                        show
                    </button>
                </form>
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection