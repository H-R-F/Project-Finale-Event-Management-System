<!-- Button trigger modal -->
<button id="clickMe" type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <form method="post" class="w-full  flex flex-col gap-y-5 " action="/calendar/store"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col gap-3 justify-center items-center">
                            <div class="flex gap-x-3.5">
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">Event Title</label>
                                    <input class="w-[17vw]" name="title" placeholder="Event Title" type="text">
                                </div>
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">Price</label>
                                    <input class="w-[17vw]" type="number" name="price" placeholder="Price">
                                </div>
                            </div>
                            <div class="flex gap-x-3.5">
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">Start Day</label>
                                    <input class="w-[17vw]" name="dateStart"  min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}"
                                        id="date-start" type="date">
                                </div>
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">Start time</label>
                                    <input class="w-[17vw]" name="timeStart" step="1800" required min="08:00:00" max="19:00:00"
                                        value="09:30:00" id="time-start" type="time">
                                </div>
                            </div>
        
                            <div class="flex gap-x-3.5">
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">End Day</label>
                                    <input class="w-[17vw]" name="dateEnd" id="date-end" type="date">
                                </div>
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">End time</label>
                                    <input class="w-[17vw]" name="timeEnd" id="time-end" type="time" >
                                </div>
                            </div>
        
                            <div class="flex items-center gap-x-3.5">
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">Localisation</label>
                                    <input class="w-[17vw]" type="text" name="localisation" placeholder="Localisation">
                                </div>
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">Image</label>
                                    <input class="w-[17vw]" type="file" name="image" class="text-sm">
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="text-sm">Categorie</label>
                                <select class="w-[35vw]" name="categorie" id="">
                                    <option value="" disabled selected>choose categorie </option>
                                    <option value="Concerts & Festivals">Concerts & Festivals</option>
                                    <option value="Théâtre & Humour">Théâtre & Humour</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Autres">Autres</option>
                                </select>
                            </div>
        
                            <div class="flex">
                                <div class="flex flex-col">
                                    <label for="" class="text-sm">Description</label>
                                    <input class="w-[35vw]" type="text" name="description" placeholder="Description">
                                </div>
                            </div>
        
                            <button class="w-f py-3 px-8 rounded-md bg-[#14ff72cb] text-black">Add Event</button>
                        </div>
                    </form>
            </div>

        </div>
    </div>
</div>
