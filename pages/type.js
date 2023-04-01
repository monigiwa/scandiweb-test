const form = document.querySelector('form');
const typeSwitcher = document.getElementById('typeSwitcher');
const dvdInfo = document.getElementById('dvd-info');
const furnitureInfo = document.getElementById('furniture-info');
const bookInfo = document.getElementById('book-info');

typeSwitcher.addEventListener('change', function() {
    if (typeSwitcher.value === 'DVD') {
      dvdInfo.style.display = 'block';
      furnitureInfo.style.display = 'none';
      bookInfo.style.display = 'none';

    } else if (typeSwitcher.value === 'Furniture') {
      furnitureInfo.style.display = 'block';
      dvdInfo.style.display = 'none';
      bookInfo.style.display = 'none';
     
    } else if (typeSwitcher.value === 'Book') {
      bookInfo.style.display = 'block';
      dvdInfo.style.display = 'none';
      furnitureInfo.style.display = 'none';
      
    } else {
      dvdInfo.style.display = 'none';
      furnitureInfo.style.display = 'none';
      bookInfo.style.display = 'none';
    }
  });