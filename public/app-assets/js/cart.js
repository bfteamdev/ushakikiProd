let showBtn = document.getElementById("showCart");
let cart = document.getElementById("cart");
let close = document.getElementById("close");
showBtn.addEventListener("click", (e) => {
  if (cart.classList.contains("active")) {
    return false;
  } else {
    cart.classList.add("active");
  }
});
close.addEventListener("click", (e) => {
    cart.classList.remove("active");
});