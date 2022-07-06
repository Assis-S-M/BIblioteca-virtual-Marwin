const menu = document.querySelector("#menuIcon");
const navMenu = document.querySelector(".menu");

menu.addEventListener("click", () => {
    
    navMenu.classList.toggle('disabled');
});

document.addEventListener("keypress", function(e) {
    if(e.key === 'Enter') {
    
        var btn = document.querySelector("#submit");
        
        btn.click();
    }
});
