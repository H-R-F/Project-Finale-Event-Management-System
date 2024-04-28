@extends('layouts.profile_layout')
@section('content')
    <div id="exTab1" class="container">
        <div class="flex justify-center items-center">
            <ul class="nav nav-pills flex gap-x-4">
                <li class="active bg-green-500 px-8 py-2 rounded-md flex justify-center items-center">
                    <a href="#1a" data-toggle="tab" class="text-white no-underline text-xl">Event You Created</a>
                </li>
                <li class="bg-green-500 px-8 py-2 rounded-md flex justify-center items-cente">
                    <a href="#2a" data-toggle="tab" class="text-white no-underline text-xl">Event You Reserved</a>
                </li>
            </ul>
        </div>

        <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
                <div class="pt-4 flex flex-wrap justify-center gap-3">
                    @foreach ($events as $event)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden w-[24vw]">
                            <img class="w-full h-48 object-cover object-center" src="{{ asset('storage/img/' . $event->image) }}" alt="{{ $event->name }}">
                            <div class="p-4">
                                <div class="flex justify-between">
                                    <h3 class="text-xl font-semibold">{{ $event->name }}</h3>
                                    <h3>{{ $event->price }} Dh</h3>
                                </div>
                                <div class="flex justify-between pb-2">
                                    <p class="text-gray-600">{{ $event->dateStart }}</p>
                                    <p class="text-gray-600">{{ $event->timeStart }}</p>
                                </div>
                                <p class="text-sm text-gray-700">{{ $event->description }}</p>
                                <div class="flex gap-x-3 mt-3">
                                    <button type="button" class="px-4 py-1 text-xl bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600" data-bs-toggle="modal" data-bs-target="#{{ $event->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('event.destroy', $event) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="px-4 py-3 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 text-xl">Delete</button>
                                    </form>
                                </div>
                            </div>
                            @include('admin.components.modal_edite')
                        </div>
                    @endforeach
                </div>
                
            </div>

            <div class="tab-pane" id="2a">
                <h3>
                    <div class="flex flex-wrap justify-between items-center gap-3">
                        @foreach ($userEvents as $event)
                        <div class="card" style="width: 25rem;">
                            <img class="w-[25rem] h-[20rem]" src="{{ asset('storage/img/' . $event->image) }}"
                                alt="">
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
                            </div>
                        </div>
                        @endforeach
                    </div>
                </h3>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript
                ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


@endsection
