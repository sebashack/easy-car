const reviews = document.querySelector(".hide");
const button = document.querySelector(".reviews");


button.addEventListener("click", ()=> {
    reviews.classList.toggle('hide');
})
