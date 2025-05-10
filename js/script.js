const nav = document.getElementById("nav");
const menuBtn = document.querySelector(".menu-btn");
const navBurger = document.querySelector(".menu-btn_burger")



menuBtn.addEventListener("click",() =>{

    nav.classList.toggle("show");
    navBurger.classList.toggle("open");

})


const fileInput = document.getElementById("file-upload");
const fileName = document.querySelector(".file-name");

fileInput.addEventListener("change", function () {
    if (fileInput.files.length > 0) {
        fileName.textContent = fileInput.files[0].name;
    } else {
        fileName.textContent = "soubor?";
    }
});

    
