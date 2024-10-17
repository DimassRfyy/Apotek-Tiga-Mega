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
            <p class="text-lg leading-[27px] font-semibold">Checkout</p>
            <button class="size-[44px] flex shrink-0">
                <img src="{{ asset('assets/images/icons/more.svg') }}" alt="icon" />
            </button>
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('front.checkout_store', $product->slug) }}" class="flex flex-col gap-[30px] mt-[30px]">
            @csrf
            <input type="hidden" name="quantity" id="quantity" value="1" class="absolute -z-10 opacity-0 w-1"
						required />
            <section id="Product-name" class="flex flex-col gap-3 px-5">
                <h2 class="font-semibold text-lg leading-[27px]">Product</h2>
                <div class="flex items-center gap-[14px]">
                    <div class="w-20 h-20 flex shrink-0 rounded-2xl overflow-hidden bg-[#F6F6F6] items-center">
                        <div class="w-full h-[50px] flex shrink-0 justify-center">
                            <img src="{{ Storage::url($product->photo) }}" class="h-full w-full object-contain" alt="thumbnail">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <p class="font-bold text-lg leading-[27px]">{{ $product->name }}</p>
                        <div class="flex items-center gap-[14px]">
                            <div class="flex items-center w-fit gap-1">
                                <p class="font-semibold text-sm leading-[21px] text-[#6E6E70]">Original 100%</p>
                                <div class="w-5 h-5 flex shrink-0">
                                    <img src="{{ asset('assets/images/icons/verify.svg') }}" alt="verify">
                                </div>
                            </div>
                            <div class="flex items-center w-fit gap-1">
                                <p class="font-semibold text-sm leading-[21px] text-[#6E6E70]">Insurance</p>
                                <div class="w-5 h-5 flex shrink-0">
                                    <img src="{{ asset('assets/images/icons/verify.svg') }}" alt="verify">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="border-[#EDEEF0] mx-5">
            <div class="flex items-center justify-between px-5">
				<label for="days" class="font-semibold">How many buys?</label>
				<div class="flex items-center gap-3 relative">
					<button type="button" id="Minus"
						class="w-11 h-11 flex shrink-0 rounded-full transition-all duration-300 hover:ring-2 hover:ring-[#FCCF2F]">
						<img src="{{ asset('assets/images/icons/minus.svg') }}" alt="minus" />
					</button>
					<p id="CountDays" class="font-semibold text-lg leading-[27px]">1</p>
					<input type="number" name="days" id="Days" value="1" class="absolute -z-10 opacity-0 w-1"
						required />
					<button type="button" id="Plus"
						class="w-11 h-11 flex shrink-0 rounded-full transition-all duration-300 hover:ring-2 hover:ring-[#FCCF2F]">
						<img src="{{ asset('assets/images/icons/plus.svg') }}" alt="plus" />
					</button>
				</div>
			</div>
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
                <div class="flex items-center rounded-2xl p-[18px_14px] gap-3 bg-[#F6F6F6] mt-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/images/icons/ticket-discount-black.svg') }}" alt="icon" />
                    </div>
                    <p class="text-sm leading-[24px] text-[#6E6E70]">Biaya kirim barang gratis untuk wilayah
                        Kota Tasikamalaya, please enjoy!</p>
                </div>
                
                
            </div>
            <hr class="border-[#EDEEF0] mx-5">
            <div id="Payment-details" class="flex flex-col px-5 gap-3">
                <h2 class="font-semibold text-lg leading-[27px]">Payment Details</h2>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center justify-between">
                        <p>Sub total</p>
                        <p id="Total" class="font-bold text-xl leading-[30px] underline"></p>
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
            <div id="Bottom-nav" class="fixed bottom-0 max-w-[640px] w-full mx-auto border-t border-[#F1F1F1] overflow-hidden z-10">
                <div class="bg-white/50 backdrop-blur-sm absolute w-full h-full"></div>
                <div class="p-5 relative z-10">
                    <button type="submit" class="rounded-full p-[12px_24px] bg-[#FCCF2F] font-bold w-full">Confirm Payment</button>
                </div>
            </div>
        </form>
    </main>

    <script src="{{ asset('customjs/checkout.js') }}"></script>
    <script>
        // function to update price and total days
const minus = document.getElementById("Minus");
const plus = document.getElementById("Plus");
const count = document.getElementById("CountDays");
const days = document.getElementById("Days");
const quantity = document.getElementById("quantity");
const totalPrice = document.getElementById("Total");
const defaultPrice = {{ $product->price }};

function updateTotalPrice() {
    let subTotal = days.value * defaultPrice;
    totalPrice.innerText = "Rp " + subTotal.toLocaleString('id-ID');
}

minus.addEventListener("click", function() {
    let currentCount = parseInt(count.innerText);
    if (currentCount > 1) {
        currentCount -= 1;
        count.innerText = currentCount;
        days.value = currentCount;
        quantity.value = currentCount;
        updateTotalPrice();
    }
});

plus.addEventListener("click", function() {
    let currentCount = parseInt(count.innerText);
    currentCount += 1;
    count.innerText = currentCount;
    days.value = currentCount;
    quantity.value = currentCount;
    updateTotalPrice();
});

days.addEventListener("change", function () {
    count.innerText = days.value;
    updateTotalPrice();
});

updateTotalPrice();

// funtion date
const datePicker = document.getElementById('date');
const btnText = document.getElementById('DateTriggerBtn');

datePicker.addEventListener('change', function () {
    if (datePicker.value) {
        btnText.innerText = datePicker.value
        btnText.classList.add("font-semibold");
    } else {
        btnText.innerText = "Select date"
        btnText.classList.remove("font-semibold"); 
    }
});

// funtion nav & tabs like bootstrap
document.addEventListener("DOMContentLoaded", function () {
    window.openPage = function (pageName, elmnt) {
        let i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.add("hidden");
        }

        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active", "ring-2", "ring-[#FCCF2F]");
        }
        
        document.getElementById(pageName).classList.remove("hidden");
        elmnt.classList.add("active", "ring-2", "ring-[#FCCF2F]");
    };

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
});

// funtion for changing required atribute
function toggleRequiredOptions() {
    const pickupRadio = document.getElementById('Pickup');
    const deliveryRadio = document.getElementById('Delivery');
    const storeRadios = document.getElementsByName('store');
    const addressTextarea = document.getElementsByName('address')[0];

    if (pickupRadio.checked) {
        storeRadios.forEach(radio => {
            radio.required = true;
        });
        addressTextarea.required = false;
    } else if (deliveryRadio.checked) {
        storeRadios.forEach(radio => {
            radio.required = false;
        });
        addressTextarea.required = true;
    }
}
    </script>
</body>
</html>