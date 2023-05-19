const toggleIcon = document.querySelector("#toggle-icon");
const aside = document.querySelector("#aside");
const main = document.querySelector("main");
const header = document.querySelector("#header");
toggleIcon.addEventListener("click", toggleSideBar);

function toggleSideBar() {
  aside.classList.toggle("active");

  setTimeout(() => {
    main.classList.toggle("aside-active");
  });
}

window.onscroll = function () {
  stickHeader();
};

function stickHeader() {
  if (
    document.body.scrollTop > 120 ||
    document.documentElement.scrollTop > 120
  ) {
    header.classList.add("active");
  } else {
    header.classList.remove("active");
  }
}
