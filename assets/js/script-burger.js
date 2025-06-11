document.addEventListener('DOMContentLoaded', function () {
  const burgerBtn = document.querySelector('.burger');
  const mobileMenu = document.querySelector('.mobile-navigation');
  const closeBtn = document.querySelector('.close-menu');
  const mobileNavContainer = document.querySelector('.mobile-nav-container');

  if (burgerBtn && mobileMenu) {
    burgerBtn.addEventListener('click', function () {
    mobileMenu.classList.remove('hidden');
    mobileNavContainer.classList.add('menu-open');
  });

    closeBtn.addEventListener('click', function () {
    mobileMenu.classList.add('hidden');
    mobileNavContainer.classList.remove('menu-open');
  });
  }
});





