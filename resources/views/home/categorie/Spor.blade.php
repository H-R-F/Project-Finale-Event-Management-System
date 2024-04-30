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
<h1 class="text-center text-black">Events</h1>


<div class=" flex flex-wrap justify-center items-center gap-3 p-4 mt-10">
    @foreach ($events as $event)
    @if ($event->categorie == 'Sport')

            <form action="{{ route('event.show', $event) }}" method="POST">
                @csrf
                <button>
                    <div class="card">
                        <img src="{{ asset('storage/img/' . $event->image) }}"
                            alt="balloon with an emoji face" class="card__img">
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
