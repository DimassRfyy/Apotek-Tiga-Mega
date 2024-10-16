<!DOCTYPE html>
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
			<section id="finishBook" class="flex flex-col gap-[30px] max-w-[353px] p-[30px_20px] items-center m-auto">
				<div class="flex flex-col gap-2 items-center">
					<h1 class="text-2xl leading-[36px] font-bold">Payment Confirm</h1>
					<p class="leading-[30px] text-[#6E6E70] text-center">Payment sudah diterima, kami akan menkonfirmasi payment anda</p>
				</div>
				<div class="w-full h-[220px] flex items-center justify-center flex-shrink-0">
					<img src="{{ Storage::url($transaction->photo_recipe) }}" alt="Thumbnail" class="size-full object-contain" />
				</div>
				<div class="flex flex-col gap-2 rounded-2xl overflow-hidden outline outline-1 outline-[#E9E8ED] p-4 w-full">
					<p class="font-semibold">Your Trx ID</p>
					<div class="flex items-center gap-3">
						<div class="w-[60px] h-[60px] flex shrink-0">
							<img src="{{ asset('assets/images/icons/crown-circle.svg') }}" alt="icon" />
						</div>
						<div class="flex flex-col">
							<p class="font-semibold">{{ $transaction->trx_id }}</p>
							<p class="text-sm leading-[21px] text-[#6E6E70]">Protect your Trx ID</p>
						</div>
					</div>
				</div>
				<div class="w-[220px] flex flex-col gap-3 items-center">
					<a href="{{ route('front.index') }}" class="w-full text-center rounded-full p-[12px_24px] bg-[#FCCF2F] font-bold text-black">Back To Home</a>
					<a href="{{ route('front.transactions') }}" class="w-full text-center rounded-full p-[12px_24px] bg-white font-bold text-black outline outline-1">Check Orders</a>
				</div>
			</section>
		</main>
	</body>
</html>
