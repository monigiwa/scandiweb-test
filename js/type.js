const form = document.querySelector("form");
const productType = document.getElementById("productType");
const dvdInfo = document.getElementById("dvd-info");
const furnitureInfo = document.getElementById("furniture-info");
const bookInfo = document.getElementById("book-info");
const productInfoMap = new Map([
  ["DVD", dvdInfo],
  ["Furniture", furnitureInfo],
  ["Book", bookInfo],
]);

productType.addEventListener("change", function () {
  const productInfo = productInfoMap.get(productType.value);
  [dvdInfo, furnitureInfo, bookInfo].forEach((info) => {
    if (info === productInfo) {
      info.style.display = "block";
    } else {
      info.style.display = "none";
    }
  });
});