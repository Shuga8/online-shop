import { SITE_URL } from "./global.js";

const count = document.querySelector(".count-span");
count.style.display = "none";
const fetch_cart_items_count = setInterval(() => {
  fetch(`${SITE_URL}/pages/get_cart_items_count`)
    .then((res) => res.text())
    .then((data) => {
      if (data == 0) return;
      count.textContent = data;
      count.style.display = "block";
    });
}, 500);
