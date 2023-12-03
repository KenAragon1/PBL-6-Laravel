const left = document.querySelector(".js-to-left-btn");
const right = document.querySelector(".js-to-right-btn");
const cardProduct = document.querySelectorAll("#js-card-product");

let x = 0;
left.addEventListener("click", () => {
  x -= 200;
  console.log(x);
  cardProduct.forEach((item) => {
    item.style.transform = `translateX(${x}px)`;
    item.style.transition = `0.3s linear`;
  });
});

right.addEventListener("click", () => {
  x += 200;
  console.log(x);
  cardProduct.forEach((item) => {
    item.style.transform = `translateX(${x}px)`;
    item.style.transition = `0.3s linear`;
  });
});
