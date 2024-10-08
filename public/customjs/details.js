document.addEventListener("DOMContentLoaded", function () {
	const mainThumbnail = document.getElementById("mainThumbnail");
	const buttons = document.querySelectorAll(".thumbnail-button");

	buttons.forEach((button) => {
		button.addEventListener("click", function () {
			const newSrc = this.querySelector("img").src;

			mainThumbnail.classList.add("opacity-0");

			setTimeout(function () {
				mainThumbnail.src = newSrc;

				mainThumbnail.classList.remove("opacity-0");
			}, 500);

			buttons.forEach((btn) => btn.classList.toggle("th-active", btn === button));
			buttons.forEach((btn) => btn.classList.toggle("th-inactive", btn !== button));
		});
	});
});
