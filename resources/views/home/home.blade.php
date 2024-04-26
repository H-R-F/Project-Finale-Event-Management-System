@extends('layouts.index')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        /* body {
            margin: 0;
            background-color: #000;
            color: #eee;
            font-family: Poppins;
            font-size: 12px;
        } */






        /* slider section  */


        .slider {
            height: 88vh;
            margin-top: -50px;
            width: 98vw;
            overflow: hidden;
            position: relative;
        }

        .slider .list .item {
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0 0 0 0;
        }

        .slider .list .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slider .list .item .content {
            position: absolute;
            top: 20%;
            width: 1140px;
            max-width: 80%;
            left: 50%;
            transform: translateX(-50%);
            padding-right: 30%;
            box-sizing: border-box;
            color: #fff;
            text-shadow: 0 5px 10px #0004;
        }

        .slider .list .item .content .title,
        .slider .list .item .content .type {
            font-size: 5em;
            font-weight: bold;
            line-height: 1.3em;
        }

        .slider .list .item .type {
            color: #14ff72cb;
        }

        .slider .list .item .button {
            display: grid;
            grid-template-columns: repeat(2, 130px);
            grid-template-rows: 40px;
            gap: 5px;
            margin-top: 20px;
        }

        .slider .list .item .button button {
            border: none;
            background-color: #eee;
            font-family: Poppins;
            font-weight: 500;
            cursor: pointer;
            transition: 0.4s;
            letter-spacing: 2px;
        }


        .slider .list .item .button button:hover {
            letter-spacing: 3px;
        }

        .slider .list .item .button button:nth-child(2) {
            background-color: transparent;
            border: 1px solid #fff;
            color: #eee;
        }





        /* Thumbnail Section  */
        .thumbnail {
            position: absolute;
            bottom: 50px;
            left: 50%;
            width: max-content;
            z-index: 100;
            display: flex;
            gap: 20px;
        }

        .thumbnail .item {
            width: 150px;
            height: 220px;
            flex-shrink: 0;
            position: relative;
        }

        .thumbnail .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3);
        }


        /* nextPrevArrows Section  */
        .nextPrevArrows {
            position: absolute;
            top: 80%;
            right: 52%;
            z-index: 100;
            width: 300px;
            max-width: 30%;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .nextPrevArrows button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #14ff72cb;
            border: none;
            color: #fff;
            font-family: monospace;
            font-weight: bold;
            transition: .5s;
            cursor: pointer;
        }

        .nextPrevArrows button:hover {
            background-color: #fff;
            color: #000;
        }

        /* Animation Part */
        .slider .list .item:nth-child(1) {
            z-index: 1;
        }


        /* animation text in first item */
        .slider .list .item:nth-child(1) .content .title,
        .slider .list .item:nth-child(1) .content .type,
        .slider .list .item:nth-child(1) .content .description,
        .slider .list .item:nth-child(1) .content .buttons {
            transform: translateY(50px);
            filter: blur(20px);
            opacity: 0;
            animation: showContent .5s 1s linear 1 forwards;
        }

        @keyframes showContent {
            to {
                transform: translateY(0px);
                filter: blur(0px);
                opacity: 1;
            }
        }

        .slider .list .item:nth-child(1) .content .title {
            animation-delay: 0.4s !important;
        }

        .slider .list .item:nth-child(1) .content .type {
            animation-delay: 0.6s !important;
        }

        .slider .list .item:nth-child(1) .content .description {
            animation-delay: 0.8s !important;
        }

        .slider .list .item:nth-child(1) .content .buttons {
            animation-delay: 1s !important;
        }




        /* Animation for next button click */
        .slider.next .list .item:nth-child(1) img {
            width: 150px;
            height: 220px;
            position: absolute;
            bottom: 50px;
            left: 50%;
            border-radius: 30px;
            animation: showImage .5s linear 1 forwards;
        }

        @keyframes showImage {
            to {
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border-radius: 0;
            }
        }

        .slider.next .thumbnail .item:nth-last-child(1) {
            overflow: hidden;
            animation: showThumbnail .5s linear 1 forwards;
        }

        .slider.prev .list .item img {
            z-index: 100;
        }


        @keyframes showThumbnail {
            from {
                width: 0;
                opacity: 0;
            }
        }


        .slider.next .thumbnail {
            animation: effectNext .5s linear 1 forwards;
        }

        @keyframes effectNext {
            from {
                transform: translateX(150px);
            }
        }



        /* Animation for prev button click */
        .slider.prev .list .item:nth-child(2) {
            z-index: 2;
        }

        .slider.prev .list .item:nth-child(2) img {
            animation: outFrame 0.5s linear 1 forwards;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        @keyframes outFrame {
            to {
                width: 150px;
                height: 220px;
                bottom: 50px;
                left: 50%;
                border-radius: 20px;
            }
        }

        .slider.prev .thumbnail .item:nth-child(1) {
            overflow: hidden;
            opacity: 0;
            animation: showThumbnail .5s linear 1 forwards;
        }

        .slider.next .nextPrevArrows button,
        .slider.prev .nextPrevArrows button {
            pointer-events: none;
        }


        .slider.prev .list .item:nth-child(2) .content .title,
        .slider.prev .list .item:nth-child(2) .content .type,
        .slider.prev .list .item:nth-child(2) .content .description,
        .slider.prev .list .item:nth-child(2) .content .buttons {
            animation: contentOut 1.5s linear 1 forwards !important;
        }

        @keyframes contentOut {
            to {
                transform: translateY(-150px);
                filter: blur(20px);
                opacity: 0;
            }
        }

        @media screen and (max-width: 678px) {
            .slider .list .item .content {
                padding-right: 0;
            }

            .slider .list .item .content .title {
                font-size: 50px;
            }
        }
    </style>


    <div class="flex justify-center items-center">

        
        {{-- <div class="bg-gray-800 w-[98vw] h-[88vh] rounded-xl mt-2"> --}}


                <div class="slider w-[98vw] h-[88vh] rounded-xl mt-2">


                    <div class="list">

                        <div class="item">
                            <img src="./image/Concerts&Festival.jpg" alt="">

                            <div class="content">
                                <div class="title">Concerts & Festival</div>
                                <div class="type">categorie</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                                    consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Sequi, aut.
                                </div>
                                <div class="button">
                                    <button class="text-black rounded-md">SEE MORE</button>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <img src="./image/Conference.jpg" alt="">

                            <div class="content">
                                <div class="title">Conference</div>
                                <div class="type">categorie</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                                    consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Sequi, aut.
                                </div>
                                <div class="button">
                                    <button>SEE MORE</button>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <img src="./image/Théâtre&Humour.jpg" alt="">

                            <div class="content">
                                <div class="title">Théâtre & Humour</div>
                                <div class="type">categorie</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                                    consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Sequi, aut.
                                </div>
                                <div class="button">
                                    <button>SEE MORE</button>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <img src="./image/Sport.png" alt="">

                            <div class="content">
                                <div class="title">Sport</div>
                                <div class="type">categorie</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                                    consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum
                                    dolor sit amet consectetur adipisicing elit. Sequi, aut.
                                </div>
                                <div class="button">
                                    <button>SEE MORE</button>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="thumbnail">

                        <div class="item">
                            <img src="./image/Concerts&Festival.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="./image/Conference.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="./image/Théâtre&Humour.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="./image/Sport.png" alt="">
                        </div>

                    </div>


                    <div class="nextPrevArrows">
                        <button class="prev">
                            < </button>
                                <button class="next"> > </button>
                    </div>


                {{-- </div> --}}


                <script src="app.js"></script>
            </body>

        </div>
    </div>
    <div>
        @include('home.components.showEvent')
        @include('home.components.ourLevel')
        @include('home.components.ourFeatures')
    </div>

    <script>
        let nextBtn = document.querySelector('.next')
        let prevBtn = document.querySelector('.prev')

        let slider = document.querySelector('.slider')
        let sliderList = slider.querySelector('.slider .list')
        let thumbnail = document.querySelector('.slider .thumbnail')
        let thumbnailItems = thumbnail.querySelectorAll('.item')

        thumbnail.appendChild(thumbnailItems[0])

        // Function for next button 
        nextBtn.onclick = function() {
            moveSlider('next')
        }


        // Function for prev button 
        prevBtn.onclick = function() {
            moveSlider('prev')
        }


        function moveSlider(direction) {
            let sliderItems = sliderList.querySelectorAll('.item')
            let thumbnailItems = document.querySelectorAll('.thumbnail .item')

            if (direction === 'next') {
                sliderList.appendChild(sliderItems[0])
                thumbnail.appendChild(thumbnailItems[0])
                slider.classList.add('next')
            } else {
                sliderList.prepend(sliderItems[sliderItems.length - 1])
                thumbnail.prepend(thumbnailItems[thumbnailItems.length - 1])
                slider.classList.add('prev')
            }


            slider.addEventListener('animationend', function() {
                if (direction === 'next') {
                    slider.classList.remove('next')
                } else {
                    slider.classList.remove('prev')
                }
            }, {
                once: true
            }) // Remove the event listener after it's triggered once
        }
    </script>
@endsection
