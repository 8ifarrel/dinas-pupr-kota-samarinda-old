document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener("scroll", function () {
      var navbar = document.querySelector(".navbar");
      var scrolled = window.scrollY > 87.44; // navbar berada pada y = 87.45px 
      navbar.classList.toggle("navbar-scrolled", scrolled);
  });
});