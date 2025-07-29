document.addEventListener("DOMContentLoaded", function () {
const img = document.querySelectorAll("img");
img.forEach(img => {
img.onmouseenter = () => img.classList.add("destaca");
img.onmouseleave = () => img.classList.remove("destaca");
});
});