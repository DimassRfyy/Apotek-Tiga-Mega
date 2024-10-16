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
        <a id="promo" href="#" class="px-5 mt-[30px]">
            <div class="w-full aspect-[353/100] flex shrink-0 overflow-hidden rounded-2xl">
                <img src="{{ asset('assets/images/backgrounds/background-recipe.png') }}" class="w-full h-full object-cover" alt="promo" />
            </div>
        </a>
        <form method="POST" enctype="multipart/form-data" action="{{ route('front.recipe_store') }}" class="flex flex-col gap-[30px] mt-[30px]">
            @csrf
            <section class="flex flex-col gap-3 px-5">
                <h2 class="font-semibold text-lg leading-[27px]">Upload Resep Disini</h2>
                <div class="flex flex-col gap-2">
                    <div class="group w-full rounded-2xl border border-[#EDEEF0] p-[18px_14px] flex items-center gap-3 transition-all duration-300 focus-within:ring-2 focus-within:ring-[#FCCF2F] relative">
                        <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/images/icons/note-add.svg') }}" alt="icon">
                        </div>
                        <button type="button" id="Upload-btn" class="appearance-none outline-none w-full text-left" onclick="document.getElementById('Proof').click()">
                            Drop or choose file here to upload
                        </button>
                        <input type="file" name="photo_recipe" id="Proof" class="absolute -z-10 opacity-0" required>
                    </div>
                    <p class="text-xs italic text-[#6E6E70]">format jpg/png/jpeg</p>
                </div>
            </section>
            <hr class="border-[#EDEEF0] mx-5">
            <div id="Customer-info" class="flex flex-col px-5 gap-5">
                <h2 class="font-semibold text-lg leading-[27px]">Customer Information</h2>
                <div class="flex flex-col gap-2">
                    <label for="name" class="font-semibold">Full Name</label>
                    <div class="group w-full rounded-2xl border border-[#EDEEF0] p-[18px_14px] flex items-center gap-3 relative transition-all duration-300 focus-within:ring-2 focus-within:ring-[#FCCF2F]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/user.svg') }}" alt="icon">
                        </div>
                        <input type="text" name="name" id="name" class="appearance-none outline-none rounded-2xl w-full placeholder:font-normal placeholder:text-black font-semibold text-sm leading-[24px]" placeholder="Write your full name" required>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="Name" class="font-semibold">Phone Number</label>
                    <div class="group w-full rounded-2xl border border-[#EDEEF0] p-[18px_14px] flex items-center gap-3 relative transition-all duration-300 focus-within:ring-2 focus-within:ring-[#FCCF2F]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/call.svg') }}" alt="icon">
                        </div>
                        <input type="tel" name="phone_number" id="Name" class="appearance-none outline-none rounded-2xl w-full placeholder:font-normal placeholder:text-black font-semibold text-sm leading-[24px]" placeholder="Write your phone number" required>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="Name" class="font-semibold">Alamat Rumah</label>
                    <textarea name="address" id="address"
								class="appearance-none outline-none rounded-2xl border border-[#EDEEF0] p-[14px] bg-white placeholder:text-[#6E6E70] placeholder:font-normal font-semibold text-sm leading-[26px]  resize-none transition-all duration-300 focus:ring-2 focus:ring-[#FCCF2F]"
								placeholder="Tuliskan alamat rumah anda dengan lengkap agar memudahkan kurir"
								rows="4"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="Name" class="font-semibold">Catatan</label>
                    <textarea name="note" id="addres"
								class="appearance-none outline-none rounded-2xl border border-[#EDEEF0] p-[14px] bg-white placeholder:text-[#6E6E70] placeholder:font-normal font-semibold text-sm leading-[26px]  resize-none transition-all duration-300 focus:ring-2 focus:ring-[#FCCF2F]"
								placeholder="Catatan (Opsional)"
								rows="4"></textarea>
                </div>
            </div>
            <section class="flex flex-col gap-3 px-5">
                <div style="background: #f2dede; color:#b94a48" class="flex items-center rounded-2xl p-[18px_14px] gap-4 mt-3">
                   <p class="leading-[24px] text-sm">
                    * Apotek Tiga Mega akan menolak dan tidak bertanggung jawab atas setiap kerugian dan risiko yang dapat timbul dari pemakaian obat tertentu yang dibeli melalui penebusan ulang resep.
                </p>
                </div>
            </section>
            <div id="Bottom-nav" class="fixed bottom-0 max-w-[640px] w-full mx-auto border-t border-[#F1F1F1] overflow-hidden z-10">
                <div class="bg-white/50 backdrop-blur-sm absolute w-full h-full"></div>
                <div class="p-5 relative z-10">
                    <button type="submit" class="rounded-full p-[12px_24px] bg-[#FCCF2F] font-bold w-full">Upload Resep</button>
                </div>
            </div>
        </form>
    </main>

    <script src="{{ asset('customjs/checkout.js') }}"></script>
</body>
</html>