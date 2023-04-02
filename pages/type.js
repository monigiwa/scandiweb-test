const form = document.querySelector('form');
const productType = document.getElementById('productType');
const dvdInfo = document.getElementById('dvd-info');
const furnitureInfo = document.getElementById('furniture-info');
const bookInfo = document.getElementById('book-info');

productType.addEventListener('change', function() {
    if (productType.value === 'DVD') {
      dvdInfo.style.display = 'block';
      furnitureInfo.style.display = 'none';
      bookInfo.style.display = 'none';

    } else if (productType.value === 'Furniture') {
      furnitureInfo.style.display = 'block';
      dvdInfo.style.display = 'none';
      bookInfo.style.display = 'none';
     
    } else if (productType.value === 'Book') {
      bookInfo.style.display = 'block';
      dvdInfo.style.display = 'none';
      furnitureInfo.style.display = 'none';
      
    } else {
      dvdInfo.style.display = 'none';
      furnitureInfo.style.display = 'none';
      bookInfo.style.display = 'none';
    }
  });