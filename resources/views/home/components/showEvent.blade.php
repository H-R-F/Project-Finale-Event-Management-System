<h1 class="text-center pt-3">Our Events</h1>
<div class="px-3 py-4">
    <ul class="nav nav-tabs flex justify-center items-center pt-2" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="allEvents-tab" data-bs-toggle="tab" data-bs-target="#allEvents-tab-pane"
                type="button" role="tab" aria-controls="allEvents-tab-pane" aria-selected="true">All
                Events</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ConcertsFestivals-tab" data-bs-toggle="tab"
                data-bs-target="#ConcertsFestivals-tab-pane" type="button" role="tab"
                aria-controls="ConcertsFestivals-tab-pane" aria-selected="false">Concerts & Festivals</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="TheatreHumour-tab" data-bs-toggle="tab"
                data-bs-target="#TheatreHumour-tab-pane" type="button" role="tab"
                aria-controls="TheatreHumour-tab-pane" aria-selected="false">Théâtre & Humour</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Conference-tab" data-bs-toggle="tab" data-bs-target="#Conference-tab-pane"
                type="button" role="tab" aria-controls="Conference-tab-pane"
                aria-selected="false">Conference</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Sport-tab" data-bs-toggle="tab" data-bs-target="#Sport-tab-pane" type="button"
                role="tab" aria-controls="Sport-tab-pane" aria-selected="false">Sport</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Others-tab" data-bs-toggle="tab" data-bs-target="#Others-tab-pane"
                type="button" role="tab" aria-controls="Others-tab-pane" aria-selected="false">Others</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="allEvents-tab-pane" role="tabpanel" aria-labelledby="allEvents-tab"
            tabindex="0">
            <div class="flex flex-wrap justify-center items-center gap-3 p-4 ">
                @foreach ($events as $event)
                    @if ($event->id <= 6)
                        <form  action="{{ route('event.show', $event) }}" method="POST">
                            @csrf
                            <button>
                                <div class="card w-[18rem] h-[28rem]">
                                    <img class="w-[18rem] h-[18rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                                    <div class="card-body px-4">
                                        <div class="flex flex-col gap-3">
                                            <div class="flex justify-between">
                                                <h3 class="text-xl">{{ $event->name }}</h3>
                                                <h3 class="text-xl">{{ $event->price }} Dh</h3>
                                            </div>
                                            <div class="flex justify-between pb-3">
                                                <h3 class="text-xl">{{ $event->dateStart }}</h3>
                                                <h3 class="text-xl">{{ $event->timeStart }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="ConcertsFestivals-tab-pane" role="tabpanel"
            aria-labelledby="ConcertsFestivals-tab" tabindex="0">
            <div class="flex flex-wrap justify-center items-center gap-3 p-4">
                @php $count = 0; @endphp
                @foreach ($events as $event)
                    @if ($event->categorie == "Concerts & Festivals" && $count < 6)
                        <form style="width: 25rem;" action="{{ route('event.show', $event) }}" method="POST">
                            @csrf
                            <button>
                                <div class="card w-[18rem] h-[28rem]">
                                    <img class="w-[18rem] h-[18rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                                    <div class="card-body px-4">
                                        <div class="flex flex-col gap-3">
                                            <div class="flex justify-between">
                                                <h3 class="text-xl">{{ $event->name }}</h3>
                                                <h3 class="text-xl">{{ $event->price }} Dh</h3>
                                            </div>
                                            <div class="flex justify-between pb-3">
                                                <h3 class="text-xl">{{ $event->dateStart }}</h3>
                                                <h3 class="text-xl">{{ $event->timeStart }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                        @php $count++; @endphp
                    @endif
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="TheatreHumour-tab-pane" role="tabpanel" aria-labelledby="TheatreHumour-tab"
            tabindex="0">
            <div class="flex flex-wrap justify-center items-center gap-3 p-4">
                @php $count = 0; @endphp
                @foreach ($events as $event)
                    @if ($event->categorie == "Théâtre & Humour" && $count < 6)
                        <form style="width: 25rem;" action="{{ route('event.show', $event) }}" method="POST">
                            @csrf
                            <button>
                                <div class="card w-[18rem] h-[28rem]">
                                    <img class="w-[18rem] h-[18rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                                    <div class="card-body px-4">
                                        <div class="flex flex-col gap-3">
                                            <div class="flex justify-between">
                                                <h3 class="text-xl">{{ $event->name }}</h3>
                                                <h3 class="text-xl">{{ $event->price }} Dh</h3>
                                            </div>
                                            <div class="flex justify-between pb-3">
                                                <h3 class="text-xl">{{ $event->dateStart }}</h3>
                                                <h3 class="text-xl">{{ $event->timeStart }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                        @php $count++; @endphp
                    @endif
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="Conference-tab-pane" role="tabpanel" aria-labelledby="Conference-tab"
            tabindex="0">
            <div class="flex flex-wrap justify-center items-center gap-3 p-4">
                @php $count = 0; @endphp
                @foreach ($events as $event)
                    @if ($event->categorie == "Conference" && $count < 6)
                        <form style="width: 25rem;" action="{{ route('event.show', $event) }}" method="POST">
                            @csrf
                            <button>
                                <div class="card w-[18rem] h-[28rem]">
                                    <img class="w-[18rem] h-[18rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                                    <div class="card-body px-4">
                                        <div class="flex flex-col gap-3">
                                            <div class="flex justify-between">
                                                <h3 class="text-xl">{{ $event->name }}</h3>
                                                <h3 class="text-xl">{{ $event->price }} Dh</h3>
                                            </div>
                                            <div class="flex justify-between pb-3">
                                                <h3 class="text-xl">{{ $event->dateStart }}</h3>
                                                <h3 class="text-xl">{{ $event->timeStart }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                        @php $count++; @endphp
                    @endif
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="Sport-tab-pane" role="tabpanel" aria-labelledby="Sport-tab" tabindex="0">
            <div class="flex flex-wrap justify-center items-center gap-3 p-4">
                @php $count = 0; @endphp
                @foreach ($events as $event)
                    @if ($event->categorie == "Sport" && $count < 6)
                        <form style="width: 25rem;" action="{{ route('event.show', $event) }}" method="POST">
                            @csrf
                            <button>
                                <div class="card w-[18rem] h-[28rem]">
                                    <img class="w-[18rem] h-[18rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                                    <div class="card-body px-4">
                                        <div class="flex flex-col gap-3">
                                            <div class="flex justify-between">
                                                <h3 class="text-xl">{{ $event->name }}</h3>
                                                <h3 class="text-xl">{{ $event->price }} Dh</h3>
                                            </div>
                                            <div class="flex justify-between pb-3">
                                                <h3 class="text-xl">{{ $event->dateStart }}</h3>
                                                <h3 class="text-xl">{{ $event->timeStart }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                        @php $count++; @endphp
                    @endif
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade" id="Others-tab-pane" role="tabpanel" aria-labelledby="Others-tab"
            tabindex="0">
            <div class="flex flex-wrap justify-center items-center gap-3 p-4">
                @php $count = 0; @endphp
                @foreach ($events as $event)
                    @if ($event->categorie == "Autres" && $count < 6)
                        <form style="width: 25rem;" action="{{ route('event.show', $event) }}" method="POST">
                            @csrf
                            <button>
                                <div class="card w-[18rem] h-[28rem]">
                                    <img class="w-[18rem] h-[18rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                                    <div class="card-body px-4">
                                        <div class="flex flex-col gap-3">
                                            <div class="flex justify-between">
                                                <h3 class="text-xl">{{ $event->name }}</h3>
                                                <h3 class="text-xl">{{ $event->price }} Dh</h3>
                                            </div>
                                            <div class="flex justify-between pb-3">
                                                <h3 class="text-xl">{{ $event->dateStart }}</h3>
                                                <h3 class="text-xl">{{ $event->timeStart }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </form>
                        @php $count++; @endphp
                    @endif
                @endforeach
            </div>
        </div>

        <div class="w-full flex justify-center items-center">
            <button class="bg-[#14ff72cb] px-9 py-2 rounded-md font-semibold">
                See More
            </button>
        </div>

    </div>
</div>
