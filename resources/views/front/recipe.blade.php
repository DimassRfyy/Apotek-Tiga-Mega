<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('output.css') }}" rel="stylesheet" />
	<link href="{{ asset('main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>
<body>
    <main class="max-w-[640px] mx-auto min-h-screen flex flex-col relative has-[#Bottom-nav]:pb-[144px]">
        <div id="Top-navbar" class="flex items-center justify-between px-5 pt-5">
            <a href="javascript:history.back()">
                <div class="size-[44px] flex shrink-0">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="icon" />
                </div>
            </a>            
            <p class="text-lg leading-[27px] font-semibold">Upload Resep</p>
            <button class="size-[44px] flex shrink-0">
                <img src="{{ asset('assets/images/icons/more.svg') }}" alt="icon" />
            </button>
        </div>
        <div class="flex flex-col gap-[30px] mt-[30px]">
            <section id="Product-name" class="flex flex-col gap-3 px-5">
                <div style="background: #f2dede; color:#b94a48" class="flex items-center rounded-2xl p-[18px_14px] gap-4 mt-3">
                   <b class="leading-[24px]">Pastikan resep Anda memiliki informasi seperti berikut untuk mempermudah verifikasi oleh Apoteker Kami</b>
                </div>
            </section>
            <hr class="border-[#EDEEF0] mx-5">
            
            <div id="Customer-info" class="flex flex-col px-5 gap-5">
                <h2 class="font-semibold text-lg leading-[27px]">Contoh Resep Fisik</h2>
               <img src="{{ asset('assets/images/photos/recipe_guide_1.jpeg') }}" alt="">
            </div>
            <hr class="border-[#EDEEF0] mx-5">
            <div id="Payment-details" class="flex flex-col px-5 gap-3">
                <h2 class="font-semibold text-lg leading-[27px]">Contoh Resep Digital</h2>
                <img src="{{ asset('assets/images/photos/recipe_guide_2.jpeg') }}" alt="">
            </div>
            <hr class="border-[#EDEEF0] mx-5">
            
            <div id="Bottom-nav" class="fixed bottom-0 max-w-[640px] w-full mx-auto border-t border-[#F1F1F1] overflow-hidden z-10">
                <div class="bg-white/50 backdrop-blur-sm absolute w-full h-full"></div>
                <div class="p-5 relative z-10">
                    <button class="rounded-full p-[12px_24px] bg-[#FCCF2F] font-bold w-full"><a href="{{ route('front.recipe_upload') }}">Lanjutkan Opload Resep</a></button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>