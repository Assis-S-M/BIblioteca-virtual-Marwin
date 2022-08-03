const menu = document.querySelector("#divIcon");
const navMenu = document.querySelector("ul");
menu.addEventListener("click", () => {
    
    navMenu.classList.toggle('disabled');
});
