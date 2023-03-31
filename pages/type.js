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
  
   form.addEventListener('submit', function(e) {
    e.preventDefault();
    if (typeSwitcher.value === '') {
    alert('Please select a product type');
    return;
    }
    if (typeSwitcher.value === 'DVD' && (size.value === '')) {
      alert('Please fill in all DVD related fields');
      return;
    }
    if (typeSwitcher.value === 'Furniture' && (height.value === '' || width.value === '')) {
    alert('Please fill in all Furniture fields');
    return;
    }
    if (typeSwitcher.value === 'Book' && (weight.value === '')) {
    alert('Please fill in all Book related fields');
    return;
    }
  });
  form.submit();