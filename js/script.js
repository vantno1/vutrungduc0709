let searchBtn = document.querySelector("#search-btn");
let searchBar = document.querySelector(".search-bar-container");
let formBtn = document.querySelector("#login-btn");
let loginForm = document.querySelector(".login-form-container");
let formClose = document.querySelector("#form-close");
let menu = document.querySelector("#menu-bar");
let navbar = document.querySelector(".navbar");
let videoBtn = document.querySelectorAll(".vid-btn");
let imgBtn = document.querySelectorAll(".img-btn");

window.onscroll = () => {
  searchBtn.classList.remove("fa-times");
  searchBar.classList.remove("active");
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
  loginForm.classList.remove("active");
};
menu.addEventListener("click", () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
});
searchBtn.addEventListener("click", () => {
  searchBtn.classList.toggle("fa-times");
  searchBar.classList.toggle("active");
});

formBtn.addEventListener("click", () => {
  loginForm.classList.add("active");
});
formClose.addEventListener("click", () => {
  loginForm.classList.remove("active");
});

// ---------------Chuyen video-----------------------//
videoBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".controls .active").classList.remove("active");
    btn.classList.add("active");
    let src = btn.getAttribute("data-src");
    document.querySelector("#video-slider").src = src;
  });
});

// --------------- Chuyen anh ---------------------//
imgBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".controls .active").classList.remove("active");
    btn.classList.add("active");
    let src = btn.getAttribute("data-src");
    document.querySelector("#img-slider").src = src;
  });
});

// Chuyen slider dung swiper js

var swiper = new Swiper(".review-slider", {
  spaceBetween: 20,
  loop: true,
  autoPlay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".brand-slider", {
  spaceBetween: 20,
  loop: true,
  autoPlay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});


// Hàm lọc và hiển thị kết quả
function filterItems() {
  const locationFilter = document.getElementById('locationFilter').value;
  const typeFilter = document.getElementById('typeFilter').value;

  let filteredItems = items;

  if (locationFilter !== 'all') {
    filteredItems = items.filter(item => item.location === locationFilter);
  }

  switch (typeFilter) {
    case 'highlight':
      filteredItems.sort((a, b) => b.price - a.price);
      break;
    case 'highPrice':
      filteredItems.sort((a, b) => b.price - a.price);
      break;
    case 'lowPrice':
      filteredItems.sort((a, b) => a.price - b.price);
      break;
    default:
      break;
  }

  displayResults(filteredItems);
}

// Hàm hiển thị kết quả
function displayResults(items) {
  const resultContainer = document.getElementById('result');
  resultContainer.innerHTML = '';

  items.forEach(item => {
    const p = document.createElement('p');
    p.textContent = `${item.name} - ${item.price} - ${item.location}`;
    resultContainer.appendChild(p);
  });
}


document.getElementById('profileImage').addEventListener('change', function(e) {
  var reader = new FileReader();
  reader.onload = function(e) {
      document.getElementById('previewImage').setAttribute('src', e.target.result);
  }
  reader.readAsDataURL(e.target.files[0]);
});

document.getElementById('profileForm').addEventListener('submit', function(e) {
  e.preventDefault();

  // Get form values
  var name = document.getElementById('name').value;
  var age = document.getElementById('age').value;
  var email = document.getElementById('email').value;
  var address = document.getElementById('address').value;
  var passport = document.getElementById('passport').value;
  var gender = document.getElementById('gender').value;

  // Perform further actions, such as saving the data to a database

  // Reset form
  document.getElementById('profileForm').reset();
  document.getElementById('previewImage').setAttribute('src', '#');
});


