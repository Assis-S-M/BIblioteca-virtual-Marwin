const menu = document.querySelector("#menuIcon");
const navMenu = document.querySelector(".menu");

menu.addEventListener("click", () => {
    
    navMenu.classList.toggle('disabled');
});