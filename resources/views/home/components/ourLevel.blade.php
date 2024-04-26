<style>
    .imagebg{
        background-image: url("./image/img5.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        background-attachment: fixed;
    }

    .imagebg::after{
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #0000007c;
    }

</style>
<div>
    <div class='h-[42vh] flex justify-center items-center gap-x-3 text-white imagebg'>
        <div class="z-10 flex justify-between w-[80vw] gap-3">
            <div class="text-center">
                <h1 class="pb-4 border-b-2 border-[#14ff72cb]">136</h1>
                <h1 class="text-3xl font-bold">ÉVÉNEMENTS ORGANISÉS</h1>
            </div>
            <div class="text-center">
                <h1 class="pb-4 border-b-2 border-[#14ff72cb]">55970</h1>
                <h1 class="text-3xl font-bold">UTILISATEURS ACTIFS

                </h1>
            </div>
            <div class="text-center">
                <h1 class="pb-4 border-b-2 border-[#14ff72cb]">211504</h1>
                <h1 class="text-3xl font-bold">BILLETS VENDUS
                </h1>
            </div>
        </div>
    </div>
</div>