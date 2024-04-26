<!-- Button trigger modal -->


<!-- Modal -->
@foreach ($events as $event)   
<div class="modal fade" id="{{ $event->id }}" tabindex="-1" aria-labelledby="{{ $event->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $event->id }}Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('event.update', $event) }}" class="flex flex-col gap-2"
                    enctype="multipart/form-data">
                    <form action="">
                    @csrf
                    @method('PUT')
                    {{-- title --}}
                    <label for="">Title</label>
                    <input value="{{ old('title', $event->name) }}" name="title" type="text"
                        class="w-full rounded-xl border-2 border-black p-2" placeholder="insert event title">
                        <div class="flex gap-2">
                            <div class="w-[100%]">
                                {{-- price --}}
                                <label for="">Price </label>
                                <input name="price" placeholder="Price" type="number"
                                    value="{{ old('price', $event->price) }}"
                                    class="w-full rounded-xl border-2 border-black p-2" placeholder="name's task">
                            </div>
                            <div class="w-[100%]">
                                {{-- location --}}
                                <label for="">Localisation</label>
                                <input name="localisation" placeholder="localisation" type="text"
                                    value="{{ old('localisation', $event->localisation) }}"
                                    class="w-full rounded-xl border-2 border-black p-2">
                            </div>
                        </div>
                    
                        {{-- description --}}
                    <label for="">Description </label>
                    <textarea name="description" placeholder="add description ..." type="text"
                        class="w-full rounded-xl border-2 border-black p-2">{{ old('description', $event->description) }}</textarea>
                    <div class="flex gap-2">
                        <div class="w-[100%]">
                            {{-- start date --}}
                            <label for="">start date </label>
                            <input min="{{ date('Y-m-d h:m') }}" value="{{ old('dateStart', $event->dateStart) }}"
                                type="date" name="dateStart" id="start-Date"
                                class="w-full rounded-xl border-2 border-black p-2">
                        </div>
                        <div class="w-[100%]">
                            {{-- end date --}}
                            <label for="">end date</label>
                            <input type="date" name="dateEnd" id="end-Date"
                                class="w-full rounded-xl border-2 border-black p-2"
                                value="{{ old('dateEnd', $event->dateEnd) }}">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-[100%]">
                            {{-- start date --}}
                            <label for="">start time </label>
                            <input min="{{ date('Y-m-d h:m') }}" value="{{ old('timeStart', $event->timeStart) }}"
                                type="time" name="timeStart" id="start-Date"
                                class="w-full rounded-xl border-2 border-black p-2">
                        </div>
                        <div class="w-[100%]">
                            {{-- end date --}}
                            <label for="">end time</label>
                            <input type="time" name="timeEnd" id="end-Date"
                                class="w-full rounded-xl border-2 border-black p-2"
                                value="{{ old('timeEnd', $event->timeEnd) }}">
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="" class="text-sm">Categorie</label>
                        <select class="w-[35vw]" name="categorie" id="">
                            <option value="" disabled selected>choose categorie </option>
                            <option value="Concerts & Festivals"  {{ $event->categorie == 'Concerts & Festivals' ? 'selected' : '' }}>Concerts & Festivals</option>
                            <option value="Théâtre & Humour" {{ $event->categorie == 'Théâtre & Humour' ? 'selected' : '' }}>Théâtre & Humour</option>
                            <option value="Conference" {{ $event->categorie == 'Conference' ? 'selected' : '' }}>Conference</option>
                            <option value="Sport" {{ $event->categorie == 'Sport' ? 'selected' : '' }}>Sport</option>
                            <option value="Autres" {{ $event->categorie == 'Autres & Festivals' ? 'selected' : '' }}>Autres</option>
                        </select>
                    </div>
                    
                    {{-- picture --}}
                    <label for="">Add picture</label>
                    <input name="image" type="file" class="w-full rounded-xl border-2 border-black p-2">
                    {{-- submit --}}
                    <input type="submit" class="bg-blue-500 px-2 py-1 rounded-xl" value="save">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach
