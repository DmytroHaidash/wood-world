(function () {
  const searchButton = document.querySelectorAll('[data-search]');
  const searchForm = document.querySelector('.search');

  searchButton.forEach(item => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      let icon = item.innerText === 'search' ? 'close' : 'search';
      item.innerText = icon;
      searchForm.classList.toggle('is-visible');
    })
  });
})();