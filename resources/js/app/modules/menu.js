/*
(function () {
  const toggle = document.querySelector('[data-menu]');
  const close = document.querySelector('[data-menu-close]');
  const menu = document.querySelector('.menu');

  toggle.addEventListener('click', function (e) {
    e.preventDefault();
    menu.classList.add('is-active');
  });

  close.addEventListener('click', function (e) {
    e.preventDefault();
    menu.classList.remove('is-active');
  })
})();*/

/**
 * Burger-menu
 */
$('.burger-menu').click(function () {
  var menu = $('.menu');
  $(this).toggleClass('active');

  if (!menu.hasClass('is-active')) {
    menu.addClass('is-active');
  } else {
    menu.removeClass('is-active');
  }
});