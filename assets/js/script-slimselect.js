// script-slimselect.js

document.addEventListener("DOMContentLoaded", function () {
  // Initialisation pour le filtre principal
  new SlimSelect({
    select: '.filtre-select'
  });

  // Initialisation pour le filtre des formats
  new SlimSelect({
    select: '.filtre-select-formats'
  });

  new SlimSelect({
  select: '#filtre-tri',
  settings: {
    showSearch: false
  }
});

});
