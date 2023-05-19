const imgInput = document.querySelector("#product_img");
const imgEl = document.querySelector("#selected-image"),
  imgName = document.querySelector("#image-name");

imgInput.addEventListener("change", () => {
  if (imgInput.files && imgInput.files[0]) {
    imgEl.src = URL.createObjectURL(imgInput.files[0]);

    imgEl.onload = () => {
      URL.revokeObjectURL(imgEl.src);
    };

    imgName.textContent = imgInput.files[0].name;
  }
});
