document.querySelector(".nav-menu-open").addEventListener("click", function() {
document.querySelector(".header__nav").classList.add("active");
})
document.querySelector(".nav-menu-close").addEventListener("click", function() {
document.querySelector(".header__nav").classList.remove("active");
})