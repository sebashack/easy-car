const reviews = document.querySelector(".hide");
const button = document.querySelector("#show-reviews-btn");

button.addEventListener("click", () => {
  reviews.classList.toggle('hide');
})
