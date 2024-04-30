@extends('layouts.index')
@section('content')
    <style>
        .card {
            --blur: 16px;
            --size: clamp(300px, 50vmin, 600px);
            width: var(--size);
            aspect-ratio: 4 / 3;
            position: relative;
            border-radius: 2rem;
            overflow: hidden;
            color: #000;
            transform: translateZ(0);
        }

        .card__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(calc(1 + (var(--hover, 0) * 0.25))) rotate(calc(var(--hover, 0) * -5deg));
            transition: transform 0.2s;
        }

        .card__footer {
            padding: 0 1.5rem;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: red;
            display: grid;
            grid-template-row: auto auto;
            gap: 0.5ch;
            background: hsl(0 0% 100% / 0.5);
            backdrop-filter: blur(var(--blur));
            height: 30%;
            align-content: center;
        }

        .card__action {
            position: absolute;
            aspect-ratio: 1;
            width: calc(var(--size) * 0.15);
            bottom: 30%;
            right: 1.5rem;
            transform: translateY(50%) translateY(calc((var(--size) * 0.4))) translateY(calc(var(--hover, 0) * (var(--size) * -0.4)));
            background: purple;
            display: grid;
            place-items: center;
            border-radius: 0.5rem;
            background: hsl(0 0% 100% / 0.5);
            /*   backdrop-filter: blur(calc(var(--blur) * 0.5)); */
            transition: transform 0.2s;
        }

        .card__action svg {
            aspect-ratio: 1;
            width: 50%;
        }

        .card__footer span:nth-of-type(1) {
            font-size: calc(var(--size) * 0.065);
        }

        .card__footer span:nth-of-type(2) {
            font-size: calc(var(--size) * 0.035);
        }

        .card:is(:hover, :focus-visible) {
            --hover: 1;
        }

        /* Style adjustments */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: inline;
        }

        .glacier-background {
            /* background-color: hsl(0, 0%, 7%) border-radius: 1rem; */

            /* max-width: 300px;
                min-height: 200px; */
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            /* max-width: 500px;
                height: 300px; */
            padding: 35px;

            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.45);
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.25);

            backdrop-filter: blur(15px);
        }
    </style>

@foreach ($showEvents as $showEvent)
    <div class="flex flex-col justify-center p-5">
        <div
            class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
            <div class="w-full md:w-1/3 bg-white grid place-items-center">
                <img src="{{ asset('storage/img/' . $showEvent->image) }}"
                    alt="tailwind logo" class="rounded-xl" />
            </div>
            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                <div class="flex justify-between item-center">
                    <p class="text-gray-500 font-medium hidden md:block">{{ $showEvent->categorie }}</p>
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <p class="text-gray-600 font-bold text-sm ml-1">
                            4.96
                            <span class="text-gray-500 font-normal">(76 reviews)</span>
                        </p>
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#14ff72cb]" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <form action="{{ route('event.pay', $showEvent->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $showEvent->id }}">
                        <input type="hidden" name="name" value="{{ $showEvent->name }}">
                        <input type="hidden" name="price" value="{{ $showEvent->price }}">
                        <input type="hidden" name="description" value="{{ $showEvent->description }}">
                        <button class="bg-[#14ff72cb] px-3 py-2 rounded-full text-xs font-medium text-gray-800 hidden m-auto  md:block">
                            Get a Ticket</button>
                    </form>
                </div>
                <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{ $showEvent->name }}</h3>
                <p class="md:text-lg text-gray-500 text-base">{{ $showEvent->description }}</p>
                <p class="text-xl font-black text-gray-800">
                    {{ $showEvent->price }} Dh
                    <span class="font-normal text-gray-600 text-base">/night</span>
                </p>
            </div>
        </div>
    </div>        
@endforeach








    <div>

        <div class=" flex flex-wrap justify-center items-center gap-3 p-4 mt-10">
            @foreach ($events as $event)
                @if ($event->categorie == $showEvent->categorie && $event->id != $showEvent->id)
                    <form action="{{ route('event.show', $event) }}" method="POST">
                        @csrf
                        <button>
                            <div class="card">
                                <img src="{{ asset('storage/img/' . $event->image) }}" alt="balloon with an emoji face"
                                    class="card__img">
                                <span class="card__footer">
                                    <div class="flex items-center justify-between pb-2">
                                        <span class="text-xl">{{ $event->name }}</span>
                                        <span class="text-xl font-semibold">{{ $event->price }} Dh</span>
                                    </div>
                                    <h5 class="text-xs"><i class="fa-solid fa-location-dot"></i>
                                        {{ $event->localisation }} Dh</h5>
                                </span>
                                <span class="card__action">
                                    <svg viewBox="0 0 448 512" title="play">
                                        <path
                                            d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" />
                                    </svg>
                                </span>
                            </div>
                        </button>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
@endsection
