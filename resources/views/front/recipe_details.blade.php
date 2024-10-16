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
            <a href="{{ route('front.index') }}">
                <div class="size-[44px] flex shrink-0">
                    <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="icon" />
                </div>
            </a>
            <p class="text-lg leading-[27px] font-semibold">Recipe Details</p>
            <button class="size-[44px] flex shrink-0">
                <img src="{{ asset('assets/images/icons/more.svg') }}" alt="icon" />
            </button>
        </div>
        <section class="flex flex-col gap-[30px] mt-[30px] px-5">
            <div class="flex items-center rounded-2xl border border-[#E9E8ED] gap-2 p-4">
                <div class="w-[60px] h-[60px] flex shrink-0">
                    <img src="{{ asset('assets/images/icons/crown-circle.svg') }}" alt="icon">
                </div>
                <div class="flex flex-col">
                    <p class="font-semibold">{{ $recipeDetails->trx_id }}</p>
                    <p class="text-sm leading-[21px] text-[#6E6E70]">Protect your Trx ID</p>
                </div>
            </div>

            @if ($recipeDetails->is_confirm == false && $recipeDetails->is_paid == false && $recipeDetails->proof == null )
            <div id="Payment-pending" class="flex items-center rounded-2xl p-[14px_16px] gap-4 bg-[#FCCF2F]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/note-black.svg') }}" alt="icon">
                </div>
                <div class="flex flex-col gap-1">
                    <div class="flex items-center gap-1">
                        <p class="font-semibold text-sm leading-[21px]">Confirm Pending</p>
                    </div>
                    <p class="text-xs leading-[18px]">Admin sedang menkonfirmasi resep anda, hubungi CS jika resep anda blm juga diproses</p>
                </div>
            </div>
            @endif

            @if ($recipeDetails->is_confirm == true && $recipeDetails->is_paid == false && $recipeDetails->proof == null)
            <div id="Payment-success" class="flex items-center rounded-2xl p-[14px_16px] gap-4 bg-black text-white">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/note-white.svg') }}" alt="icon">
                </div>
                <div class="flex flex-col gap-1">
                    <div class="flex items-center gap-1">
                        <p class="font-semibold text-sm leading-[21px]">Confirm Success</p>
                        <div class="w-5 h-5 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/verify.svg') }}" alt="icon">
                        </div>
                    </div>
                    <p class="text-xs leading-[18px]">Resep anda sudah kami konfirmasi, silahkan lakukan pembayaran dibawah</p>
                </div>
            </div>
            @endif

            @if ($recipeDetails->is_confirm == true && $recipeDetails->is_paid == false && $recipeDetails->proof == !null )
            <div id="Payment-pending" class="flex items-center rounded-2xl p-[14px_16px] gap-4 bg-[#FCCF2F]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/note-black.svg') }}" alt="icon">
                </div>
                <div class="flex flex-col gap-1">
                    <div class="flex items-center gap-1">
                        <p class="font-semibold text-sm leading-[21px]">Payment Pending</p>
                    </div>
                    <p class="text-xs leading-[18px]">Payment anda sedang dikonfirmasi, Hubungi CS jika payment blm juga dikonfirmasi.</p>
                </div>
            </div>
            @endif
           
            @if ($recipeDetails->is_confirm && $recipeDetails->is_paid)
            <div id="Payment-success" class="flex items-center rounded-2xl p-[14px_16px] gap-4 bg-black text-white">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/note-white.svg') }}" alt="icon">
                </div>
                <div class="flex flex-col gap-1">
                    <div class="flex items-center gap-1">
                        <p class="font-semibold text-sm leading-[21px]">Payment Success</p>
                        <div class="w-5 h-5 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/verify.svg') }}" alt="icon">
                        </div>
                    </div>
                    <p class="text-xs leading-[18px]">Pembayaran resep anda sudah dikonfirmasi, kami akan segera mengirim ke alamat anda</p>
                </div>
            </div>
            @endif
            
            
            <hr class="border-[#EDEEF0]">
            <div id="Customer-info" class="flex flex-col px-5 gap-5">
                <h2 class="font-semibold text-lg leading-[27px]">Your Recipe</h2>
               <img src="{{ Storage::url($recipeDetails->photo_recipe) }}" alt="">
            </div>
            <section class="flex flex-col gap-5">
                <div class="info-card flex flex-col gap-2">
                    <p class="font-semibold">Full Name</p>
                    <div class="flex items-center rounded-2xl p-[18px_14px] gap-3 bg-[#F4F4F6]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/user.svg') }}" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">{{ $recipeDetails->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="info-card flex flex-col gap-2">
                    <p class="font-semibold">Phone Number</p>
                    <div class="flex items-center rounded-2xl p-[18px_14px] gap-3 bg-[#F4F4F6]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/call.svg') }}" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">{{ $recipeDetails->phone_number }}</p>
                        </div>
                    </div>
                </div>
                <div class="info-card flex flex-col gap-2">
                    <p class="font-semibold">Tanggal</p>
                    <div class="flex items-center rounded-2xl p-[18px_14px] gap-3 bg-[#F4F4F6]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/calendar.svg') }}" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">{{ $recipeDetails->updated_at->translatedFormat('j F Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="info-card flex flex-col gap-2">
                    <p class="font-semibold">Catatan</p>
                    <div class="flex items-center rounded-2xl p-[18px_14px] gap-3 bg-[#F4F4F6]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/buildings.svg') }}" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold"></p>
                            <p class="text-sm leading-[21px] text-[#6E6E70]">{{ $recipeDetails->note }}</p>
                        </div>
                    </div>
                </div>
             
                
               
                <div class="info-card flex flex-col gap-2">
                    <p class="font-semibold">Home Deliver to</p>
                    <div class="flex items-center rounded-2xl p-[18px_14px] gap-3 bg-[#F4F4F6]">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{ asset('assets/images/icons/house-2.svg') }}" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">{{ $recipeDetails->address }}</p>
                        </div>
                    </div>
                </div>
            </section>

            @if ($recipeDetails->is_confirm && $recipeDetails->proof == null )
        <form method="POST" enctype="multipart/form-data" action="{{ route('front.checkout_recipe', $recipeDetails->id) }}" class="flex flex-col gap-[30px] mt-[30px]">
            @csrf
            <hr class="border-[#EDEEF0] mx-5">
        <div id="Payment-details" class="flex flex-col px-5 gap-3">
            <h2 class="font-semibold text-lg leading-[27px]">Payment Details</h2>
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <p>Sub total</p>
                    <p id="Total" class="font-bold text-xl leading-[30px] underline">{{ 'Rp ' . number_format($subTotal, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <hr class="border-[#EDEEF0] mx-5">
        <div id="Send-Payment" class="flex flex-col px-5 gap-3">
            <h2 class="font-semibold text-lg leading-[27px]">Send Payment</h2>
            <div class="flex items-center gap-3">
                <div class="w-[71px] h-[50px] flex shrink-0">
                    <img src="{{ asset('assets/images/logos/bca.svg') }}" class="w-full h-full object-contain" alt="bank logo">
                </div>
                <div class="flex flex-col gap-[2px]">
                    <div class="flex items-center w-fit gap-1">
                        <p class="font-semibold">Apotek Tiga Mega</p>
                        <div class="w-[18px] h-[18px] flex shrink-0">
                            <img src="{{ asset('assets/images/icons/verify.svg') }}" alt="verify">
                        </div>
                    </div>
                    <p class="text-[#6E6E70]">8008129839</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-[71px] h-[50px] flex shrink-0">
                    <img src="{{ asset('assets/images/logos/mandiri.svg') }}" class="w-full h-full object-contain" alt="bank logo">
                </div>
                <div class="flex flex-col gap-[2px]">
                    <div class="flex items-center w-fit gap-1">
                        <p class="font-semibold">Apotek Tiga Mega</p>
                        <div class="w-[18px] h-[18px] flex shrink-0">
                            <img src="{{ asset('assets/images/icons/verify.svg') }}" alt="verify">
                        </div>
                    </div>
                    <p class="text-[#6E6E70]">12379834983281</p>
                </div>
            </div>
        </div>
        <hr class="border-[#EDEEF0] mx-5">
        <div id="Confirm-Payment" class="flex flex-col px-5 gap-5">
            <h2 class="font-semibold text-lg leading-[27px]">Confirm Payment</h2>
            <div class="flex flex-col gap-2">
                <label for="Proof" class="font-semibold">Upload Proof</label>
                <div class="group w-full rounded-2xl border border-[#EDEEF0] p-[18px_14px] flex items-center gap-3 transition-all duration-300 focus-within:ring-2 focus-within:ring-[#FCCF2F] relative">
                    <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/note-add.svg') }}" alt="icon">
                    </div>
                    <button type="button" id="Upload-btn" class="appearance-none outline-none w-full text-left" onclick="document.getElementById('Proof').click()">
                    Add an attachment
                    </button>
                    <input type="file" name="proof" id="Proof" class="absolute -z-10 opacity-0" required>
                </div>
            </div>
            <label class="flex items-center gap-[6px]">
                <input type="checkbox" name="" class="w-[24px] h-[24px] appearance-none checked:border-[5px] checked:border-solid checked:border-white rounded-[10px] checked:bg-[#FCCF2F] ring-1 ring-[#EDEEF0] transition-all duration-300" required/>
                <p class="font-semibold text-sm leading-[21px]">Saya benar telah transfer pembayaran</p>
            </label>
        </div>
            <div class="flex items-center justify-between p-5 relative z-10">
                <button type="submit" class="rounded-full p-[12px_24px] bg-[#FCCF2F] font-bold w-full">Confirm Payment</button>
            </div>
        </form>
            @endif
            

            @if ( $recipeDetails->proof == !null && $recipeDetails->is_confirm == true)
            <hr class="border-[#EDEEF0]">
            <div id="Payment-details" class="flex flex-col gap-3">
                <h2 class="font-semibold text-lg leading-[27px]">Payment Details</h2>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center justify-between">
                        <p>Sub total</p>
                        <p class="font-bold text-xl leading-[30px] underline">{{ 'Rp ' . number_format($subTotal, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </section>
        <div id="Bottom-nav" class="fixed bottom-0 max-w-[640px] w-full mx-auto border-t border-[#F1F1F1] overflow-hidden z-10">
            <div class="bg-white/50 backdrop-blur-sm absolute w-full h-full"></div>
            <div class="flex items-center justify-between p-5 relative z-10">
                <a href="" class="rounded-full p-[12px_24px] bg-[#FCCF2F] font-bold w-full text-center">Contact Customer Service</a>
            </div>
        </div>
        @endif
        @if ($recipeDetails->is_confirm == false && $recipeDetails->is_paid == false && $recipeDetails->proof == null)
        <div class="flex items-center justify-between p-5 relative z-10">
            <button class="rounded-full p-[12px_24px] bg-[#FCCF2F] font-bold w-full text-center">Contact Customer Service</button>
        </div>
        @endif
    </main>
    <script src="{{ asset('customjs/checkout.js') }}"></script>
</body>
</html>