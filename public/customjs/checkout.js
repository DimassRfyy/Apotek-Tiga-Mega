const fileInput = document.getElementById("Proof");
const fileBtn = document.getElementById("Upload-btn");

fileInput.addEventListener("change", function () {
    const file = this.files[0];

    if(file){
        fileBtn.innerText = file.name;
        fileBtn.classList.add("font-semibold");
    }else{
        fileBtn.innerText = "Add an attachments";
        fileBtn.classList.remove("font-semibold");
    }
});