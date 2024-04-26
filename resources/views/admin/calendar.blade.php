@extends('layouts.profile_layout')
@section('content')
    <style>
        
        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            /* max-width: 800px; */
            width: 88vw;
            margin: 0 auto;
            position: relative;
        }

        table * {
            position: relative;
        }

        table td,
        table th {
            padding-left: 8px;
        }

        table thead tr {
            height: 60px;
            background: #14ff72cb;
            font-size: 16px;
        }

        table tbody tr {
            height: 48px;
            border-bottom: 1px solid #14ff72cb;
        }

        table tbody tr:last-child {
            border: 0;
        }

        table td,
        table th {
            text-align: left;
        }

        table td.l,
        table th.l {
            text-align: right;
        }

        table td.c,
        table th.c {
            text-align: center;
        }

        table td.r,
        table th.r {
            text-align: center;
        }

        @media screen and (max-width: 35.5em) {
            table {
                display: block;
            }

            table>*,
            table tr,
            table td,
            table th {
                display: block;
            }

            table thead {
                display: none;
            }

            table tbody tr {
                height: auto;
                padding: 8px 0;
            }

            table tbody tr td {
                padding-left: 45%;
                margin-bottom: 12px;
            }

            table tbody tr td:last-child {
                margin-bottom: 0;
            }

            table tbody tr td:before {
                position: absolute;
                font-weight: 700;
                width: 40%;
                left: 10px;
                top: 0;
            }

            table tbody tr td:nth-child(1):before {
                content: "Code";
            }

            table tbody tr td:nth-child(2):before {
                content: "Stock";
            }

            table tbody tr td:nth-child(3):before {
                content: "Cap";
            }

            table tbody tr td:nth-child(4):before {
                content: "Inch";
            }

            table tbody tr td:nth-child(5):before {
                content: "Box Type";
            }
        }

        /* body {
                background: #9bc86a;
                font: 400 14px 'Calibri', 'Arial';
                padding: 20px;
            } */

        blockquote {
            color: white;
            text-align: center;
        }
    </style>

    <body>

        <div class="">

            <div class="w-[88vw] h-[60vh] bg-white rounded-3xl border-none p-3 text-xs" id="calendar"></div>

            @include('admin.components.modal')

        </div>


        <script>
            document.addEventListener('DOMContentLoaded', async function() {

                const {
                    data
                } = await axios.get("/calendar/show");

                const events = data.events;

                console.log(data);




                var myCalendar = document.getElementById('calendar');


                var calendar = new FullCalendar.Calendar(myCalendar, {
                    headerToolbar: {
                        left: 'dayGridMonth,timeGridWeek,timeGridDay',
                        center: 'title',
                        right: 'listMonth,listWeek,listDay'
                    },
                    views: {
                        listDay: { // Customize the name for listDay
                            buttonText: 'Day Events',
                        },
                        listWeek: { // Customize the name for listWeek
                            buttonText: 'Week Events'
                        },
                        listMonth: { // Customize the name for listMonth
                            buttonText: 'Month Events'
                        },
                        timeGridWeek: {
                            buttonText: 'Week', // Customize the button text
                        },
                        timeGridDay: {
                            buttonText: "Day",
                        },
                        dayGridMonth: {
                            buttonText: "Month",
                        },

                    },


                    initialView: "timeGridWeek",
                    slotMinTime: "09:00:00", // min  time  appear in the calendar
                    slotMaxTime: "19:00:00",
                    nowIndicator: true,
                    selectable: true,
                    selectMirror: true,
                    selectOverlap: true,
                    weekends: true,

                    // events  hya  property dyal full calendar
                    //  kat9bel array dyal objects  khass  i kono jayin 3la chkl  object fih  start  o end  7it hya li kayfahloha
                    events: events,

                    selectAllow: (info) => {
                        let instant = new Date()
                        return info.start > instant
                    },

                    select: (info) => {

                        let start = info.start
                        let end = info.end


                        if (end.getDate() - start.getDate() > 0 && !info.allDay) {
                            alert("rak khditi bzaf dyal l wa9t")
                            calendar.unselect()
                            return
                        }
                        document.getElementById("date-start").value = formatDate(start).day
                        if (info.allDay) {
                            document.getElementById("date-end").value = formatDate(start).day
                            document.getElementById("time-start").value = "09:00:00"
                            document.getElementById("time-end").value = "19:00:00"
                        } else {
                            document.getElementById("date-end").value = formatDate(end).day
                            document.getElementById("time-start").value = formatDate(start).time
                            document.getElementById("time-end").value = formatDate(end).time
                        }


                        document.getElementById("clickMe").click()


                    },

                    eventClick: (info) => {
                        // alert("event clicked")

                        console.log(info);
                    }


                });


                calendar.render();


                function formatDate(date) {
                    let year = String(date.getFullYear())
                    let month = String(date.getMonth() + 1).padStart(2, 0)
                    let day = String(date.getDate()).padStart(2, 0)

                    let hour = String(date.getHours()).padStart(2, 0)
                    let min = String(date.getMinutes()).padStart(2, 0)
                    let sec = String(date.getSeconds()).padStart(2, 0)

                    return {
                        day: `${year}-${month}-${day}`,
                        time: `${hour}:${min}:${sec}`
                    }


                }
            });
        </script>
        {{-- 
        <div class="pt-4">
            @foreach ($events as $event)
                <div class="flex flex-wrap gap-3">
                    <div class="card" style="width: 25rem;">
                        <img class="w-[25rem] h-[20rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                        <div class="card-body px-4">
                            <div class="flex flex-col gap-3">
                                <div class="flex justify-between">
                                    <h1>{{ $event->name }}</h1>
                                    <h1>{{ $event->price }} Dh</h1>
                                </div>
                                <div class="flex justify-between pb-3">
                                    <h1 class="tex">{{ $event->dateStart }}</h1>
                                    <h1>{{ $event->timeStart }}</h1>
                                </div>
                            </div>
                            <p class="card-text text-sm">{{ $event->description }}kmskldmklmklmklgmdklmgklsdfmklsdfm</p>
                        </div>
                    </div>
            @endforeach
        </div> --}}


        <div class="pt-4">

            <table>
                <thead>
                    <tr>
                        <th>image</th>
                        <th>Name</th>
                        <th>date Start</th>
                        <th>date End</th>
                        <th>time Start</th>
                        <th>time End</th>
                        <th>localisation</th>
                        <th>categorie</th>
                        <th>Price</th>
                        <th>edite</th>
                        <th>delete</th>
                    </tr>
                    <thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                                <td>
                                    <img class="w-[6rem] h-[6rem]" src="{{ asset('storage/img/' . $event->image) }}" alt="">
                                </td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->dateStart }}</td>
                                <td>{{ $event->dateEnd }}</td>
                                <td>{{ $event->timeStart }}</td>
                                <td>{{ $event->timeEnd }}</td>
                                <td>{{ $event->localisation }}</td>
                                <td>{{ $event->categorie }}</td>
                                <td>{{ $event->price }} Dh</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#{{ $event->id }}">
                                        edite
                                    </button>
                                </td>
                                <td>
                                    <form action="{{ route('event.destroy', $event) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        {{-- <tr>
                            <td>CES-9000</td>
                            <td>50mt</td>
                            <td>9mm</td>
                            <td>1/2"</td>
                            <td>Kangal / Coil</td>
                        </tr> --}}
                    </tbody>
            </table>
        </div>
        @include('admin.components.modal_edite')
    </body>
@endsection

</html>
