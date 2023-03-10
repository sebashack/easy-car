const reviews = document.querySelector(".hide");
const button = document.querySelector(".btn-primary")

button.addEventListener("click", ()=> {
    reviews.classList.toggle('hide')
})