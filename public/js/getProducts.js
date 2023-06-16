import { SITE_URL } from "./global.js";

const menSpanCount = document.querySelector(".men-span-count"),
  womenSpanCount = document.querySelector(".women-span-count"),
  unisexSpanCount = document.querySelector(".unisex-span-count"),
  childrenSpanCount = document.querySelector(".children-span-count");

let getProductAmountByCategory = setInterval(() => {
  getMenProductCategoryCount();
  getWomenProductCount();
  getUnisexProductCount();
  getChildrenProductCount();
}, 500);

// By categories
async function getMenProductCategoryCount() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", `${SITE_URL}/pages/getMenCategoryCount`, true);

  try {
    xhr.onload = function () {
      if (xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;

        if (data == "") {
          menSpanCount.textContent = `(0)`;
        } else {
          menSpanCount.textContent = `(${data})`;
        }
      }
    };
  } catch (e) {
    console.log(e);
  }

  xhr.send();
}

async function getWomenProductCount() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", `${SITE_URL}/pages/getWomenCategoryCount`, true);

  try {
    xhr.onload = function () {
      if (xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;

        if (data == "") {
          womenSpanCount.textContent = `(0)`;
        } else {
          womenSpanCount.textContent = `(${data})`;
        }
      }
    };
  } catch (e) {
    console.log(e);
  }

  xhr.send();
}

async function getUnisexProductCount() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", `${SITE_URL}/pages/getUnisexCategoryCount`, true);

  try {
    xhr.onload = function () {
      if (xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;

        if (data == "") {
          unisexSpanCount.textContent = `(0)`;
        } else {
          unisexSpanCount.textContent = `(${data})`;
        }
      }
    };
  } catch (e) {
    console.log(e);
  }

  xhr.send();
}

async function getChildrenProductCount() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", `${SITE_URL}/pages/getChildrenCategoryCount`, true);

  try {
    xhr.onload = function () {
      if (xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;

        if (data == "") {
          childrenSpanCount.textContent = `(0)`;
        } else {
          childrenSpanCount.textContent = `(${data})`;
        }
      }
    };
  } catch (e) {
    console.log(e);
  }

  xhr.send();
}

// By size

let getProductAmountBySize = setInterval(() => {}, 500);

async function getSmallProductsCount() {}
