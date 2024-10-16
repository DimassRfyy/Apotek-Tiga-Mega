<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="{{ asset('output.css') }}" rel="stylesheet" />
		<link href="{{ asset('main.css') }}" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	</head>
	<body>
		<main class="max-w-[640px] mx-auto min-h-screen flex flex-col relative has-[#Bottom-nav]:pb-[144px]">
			<div id="Top-navbar" class="flex items-center justify-between pt-5 px-5">
				<a href="index.html" class="flex shrink-0">
					<img src="assets/images/logos/logo-apotek.png" alt="logo" />
				</a>
				<a href="{{ route('front.search.product') }}" class="w-11 h-11 flex shrink-0">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="45" viewBox="0 0 30 30">
						<path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"></path>
						</svg>
				</a>
			</div>

			<section id="Categories" class="flex flex-col gap-[10px] mt-[30px] px-5">
				<div class="flex justify-between items-center">
					<h2 class="font-semibold text-lg leading-[27px]">By Categories</h2>
					<a href="{{ route('front.all_categories') }}"><u class="text-sm">lihat semua ></u></a>
				</div>
				
				<div class="grid grid-cols-3 gap-4">

					@forelse ($categories as $category)
						<a href="{{ route('front.category', $category->slug) }}" class="card">
							<div class="rounded-2xl ring-1 ring-[#EDEEF0] p-4 flex flex-col items-center gap-3 text-center transition-all duration-300 hover:ring-2 hover:ring-[#FCCF2F]">
								<div class="w-[50px] h-[50px] flex shrink-0">
									<img src="{{ Storage::url($category->icon) }}" alt="icon" />
								</div>
								<p class="font-semibold">{{ $category->name }}</p>
							</div>
						</a>
						@empty
							<p>Belum Ada Kategory</p>
						@endforelse
				</div>
			</section>
			<a id="promo" href="#" class="px-5 mt-[30px]">
				<div class="w-full aspect-[353/100] flex shrink-0 overflow-hidden rounded-2xl">
					<img src="assets/images/backgrounds/banner-real.png" class="w-full h-full object-cover" alt="promo" />
				</div>
			</a>
			<section id="New" class="flex flex-col gap-[10px] mt-[30px]">
				<h2 class="font-semibold text-lg leading-[27px] px-5">Product New</h2>
				<div class="swiper w-full h-fit">
					<div class="swiper-wrapper">

						@forelse ($latest_products as $item)
						<a href="{{ route('front.details', $item->slug) }}" class="swiper-slide max-w-[150px] first-of-type:ml-5 last-of-type:mr-5">
							<div class="flex flex-col gap-3 bg-white">
								<div class="h-[130px] flex shrink-0 items-center rounded-2xl overflow-hidden bg-[#F6F6F6]">
									<div class="h-[70px] w-full flex shrink-0 justify-center">
										<img src="{{ Storage::url($item->photo) }}" class="w-full h-full object-contain" alt="thumbnail" />
									</div>
								</div>
								<div class="flex flex-col gap-1">
									<p class="font-semibold break-words">{{ $item->name }}</p>
									<div class="flex items-center justify-between">
										<p class="text-sm leading-[21px] text-[#6E6E70]">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</p>
										<div class="flex items-center gap-[2px]">
											<div class="w-4 h-4 flex shrink-0">
												<img src="assets/images/icons/Star 1.svg" alt="star" />
											</div>
											<p class="font-semibold text-sm leading-[21px]">4/5</p>
										</div>
									</div>
								</div>
							</div>
						</a>
						@empty
							<p>Belum ada produk terbaru</p>
						@endforelse
						


					</div>
				</div>
			</section>
			<section id="Recommendation" class="flex flex-col gap-[10px] mt-[30px] px-5">
				<h2 class="font-semibold text-lg leading-[27px]">You Might Like</h2>
				<div class="flex flex-col gap-5">
					@forelse ($random_products as $item)
					<a href="{{ route('front.details', $item->slug) }}" class="card">
						<div class="flex items-center gap-3">
							<div class="w-20 h-20 flex shrink-0 rounded-2xl overflow-hidden bg-[#F6F6F6] items-center">
								<div class="w-full h-[50px] flex shrink-0 justify-center">
									<img src="{{ Storage::url($item->photo) }}" class="h-full w-full object-contain" alt="thumbnail" />
								</div>
							</div>
							<div class="w-full flex flex-col gap-1">
								<p class="font-semibold">{{ $item->name }}</p>
								<div class="flex items-center justify-between">
									<p class="text-sm leading-[21px] text-[#6E6E70]">{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</p>
									<div class="flex items-center w-fit gap-[2px]">
										<div class="w-4 h-4 flex shrink-0">
											<img src="assets/images/icons/Star 1.svg" alt="star" />
										</div>
										<p class="text-sm leading-[21px]"><span class="font-semibold">4/5</span> <span class="text-[#6E6E70]">({{ $item->transactions->count() }})</span></p>
									</div>
								</div>
							</div>
						</div>
					</a>
					@empty
						<p>Tidak Dapat Memuat Produk</p>
					@endforelse
					
					
				</div>
			</section>
			<div id="Bottom-nav" class="fixed bottom-0 max-w-[640px] w-full mx-auto border-t border-[#F1F1F1] overflow-hidden z-10">
				<div class="bg-white/50 backdrop-blur-sm absolute w-full h-full"></div>
				<ul class="flex items-center gap-3 justify-evenly p-5 relative z-10">
					<li>
						<a href="{{ route('front.index') }}">
							<div class="group flex flex-col items-center text-center gap-2 transition-all duration-300 hover:text-black">
								<div class="w-6 h-6 flex shrink-0">
									<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M17.325 18.98H7.92495C7.50495 18.98 7.03495 18.65 6.89495 18.25L2.75495 6.66999C2.16496 5.00999 2.85496 4.49999 4.27496 5.51999L8.17495 8.30999C8.82495 8.75999 9.56495 8.52999 9.84495 7.79999L11.605 3.10999C12.165 1.60999 13.095 1.60999 13.655 3.10999L15.415 7.79999C15.695 8.52999 16.435 8.75999 17.075 8.30999L20.735 5.69999C22.295 4.57999 23.045 5.14999 22.405 6.95999L18.365 18.27C18.215 18.65 17.745 18.98 17.325 18.98Z"
											stroke="currentColor"
											stroke-width="2"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
										<path d="M7.125 22H18.125" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M10.125 14H15.125" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<p class="font-semibold text-sm leading-[21px] text-[]">Browse</p>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ route('front.transactions') }}">
							<div class="group flex flex-col items-center text-center gap-2 transition-all duration-300 hover:text-black text-[#9D9DAD]">
								<div class="w-6 h-6 flex shrink-0">
									<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.875 2V5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M16.875 2V5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M7.875 13H15.875" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M7.875 17H12.875" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
										<path
											d="M16.875 3.5C20.205 3.68 21.875 4.95 21.875 9.65V15.83C21.875 19.95 20.875 22.01 15.875 22.01H9.875C4.875 22.01 3.875 19.95 3.875 15.83V9.65C3.875 4.95 5.545 3.69 8.875 3.5H16.875Z"
											stroke="currentColor"
											stroke-width="2"
											stroke-miterlimit="10"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
									</svg>
								</div>
								<p class="font-semibold text-sm leading-[21px] text-[]">Orders</p>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ route('front.recipe') }}">
							<div class="group flex flex-col items-center text-center gap-2 transition-all duration-300 hover:text-black text-[#9D9DAD]">
								<div class="w-6 h-6 flex shrink-0">
									<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M19.625 12.5C19.625 11.12 20.745 10 22.125 10V9C22.125 5 21.125 4 17.125 4H7.125C3.125 4 2.125 5 2.125 9V9.5C3.505 9.5 4.625 10.62 4.625 12C4.625 13.38 3.505 14.5 2.125 14.5V15C2.125 19 3.125 20 7.125 20H17.125C21.125 20 22.125 19 22.125 15C20.745 15 19.625 13.88 19.625 12.5Z"
											stroke="currentColor"
											stroke-width="2"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
										<path d="M9.125 14.75L15.125 8.75" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M15.1195 14.75H15.1285" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M9.11951 9.25H9.12849" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<p class="font-semibold text-sm leading-[21px] text-[]">Recipe</p>
							</div>
						</a>
					</li>
					<li>
						<a href="/admin/login">
							<div class="group flex flex-col items-center text-center gap-2 transition-all duration-300 hover:text-black text-[#9D9DAD]">
								<div class="w-6 h-6 flex shrink-0">
									<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M18.375 18.86H17.615C16.815 18.86 16.055 19.17 15.495 19.73L13.785 21.42C13.005 22.19 11.735 22.19 10.955 21.42L9.245 19.73C8.685 19.17 7.915 18.86 7.125 18.86H6.375C4.715 18.86 3.375 17.53 3.375 15.89V4.97998C3.375 3.33998 4.715 2.01001 6.375 2.01001H18.375C20.035 2.01001 21.375 3.33998 21.375 4.97998V15.89C21.375 17.52 20.035 18.86 18.375 18.86Z"
											stroke="currentColor"
											stroke-width="2"
											stroke-miterlimit="10"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
										<path
											d="M7.375 9.16003C7.375 8.23003 8.135 7.46997 9.065 7.46997C9.995 7.46997 10.755 8.23003 10.755 9.16003C10.755 11.04 8.085 11.24 7.495 13.03C7.375 13.4 7.685 13.77 8.075 13.77H10.755"
											stroke="currentColor"
											stroke-width="2"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
										<path
											d="M16.415 13.76V8.05003C16.415 7.79003 16.245 7.55997 15.995 7.48997C15.745 7.41997 15.475 7.51997 15.335 7.73997C14.615 8.89997 13.835 10.22 13.155 11.38C13.045 11.57 13.045 11.82 13.155 12.01C13.265 12.2 13.475 12.3199 13.705 12.3199H17.375"
											stroke="currentColor"
											stroke-width="2"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
									</svg>
								</div>
								<p class="font-semibold text-sm leading-[21px] text-[]">Admin</p>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<script src="{{ asset('customjs/browse.js') }}"></script>
	</body>
</html>
