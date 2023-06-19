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

const smallSpanCount = document.querySelector(".small-span-count"),
  mediumSpanCount = document.querySelector(".medium-span-count"),
  largeSpanCount = document.querySelector(".large-span-count"),
  xtraLargeSpanCount = document.querySelector(".xtra-large-span-count");

let getProductAmountBySize = setInterval(() => {
  getSmallProductsCount();
  getMediumProductsCount();
  getLargeProductsCount();
  getExtraLargeProductsCount();
}, 500);

async function getSmallProductsCount() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", `${SITE_URL}/pages/getSmallProductsCount`, true);

  try {
    xhr.onload = function () {
      if (xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;

        if (data == "") {
          smallSpanCount.textContent = `Small (0)`;
        } else {
          smallSpanCount.textContent = `Small (${data})`;
        }
      }
    };
  } catch (e) {
    console.log(e);
  }

  xhr.send();
}

async function getMediumProductsCount() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", `${SITE_URL}/pages/getMediumProductsCount`, true);

  try {
    xhr.onload = function () {
      if (xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;

        if (data == "") {
          mediumSpanCount.textContent = `Medium (0)`;
        } else {
          mediumSpanCount.textContent = `Medium (${data})`;
        }
      }
    };
  } catch (e) {
    console.log(e);
  }

  xhr.send();
}

async function getLargeProductsCount() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", `${SITE_URL}/pages/getLargeProductsCount`, true);

  try {
    xhr.onload = function () {
      if (xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;

        if (data == "") {
          largeSpanCount.textContent = `Large (0)`;
        } else {
          largeSpanCount.textContent = `Large (${data})`;
        }
      }
    };
  } catch (e) {
    console.log(e);
  }

  xhr.send();
}

async function getExtraLargeProductsCount() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", `${SITE_URL}/pages/getExtraLargeProductsCount`, true);

  try {
    xhr.onload = function () {
      if (xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;

        if (data == "") {
          xtraLargeSpanCount.textContent = `Xtra Large (0)`;
        } else {
          xtraLargeSpanCount.textContent = `Xtra Large (${data})`;
        }
      }
    };
  } catch (e) {
    console.log(e);
  }

  xhr.send();
}
