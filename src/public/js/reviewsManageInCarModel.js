const reviews = document.querySelector(".hide");
const button = document.querySelector(".show");


button.addEventListener("click", ()=> {
    reviews.classList.toggle('hide');
})
