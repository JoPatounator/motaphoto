console.log("Lightbox JS chargé !");

document.addEventListener("DOMContentLoaded", function () {
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightbox-image");
  const closeBtn = document.getElementById("lightbox-close");
  const refText = document.getElementById("lightbox-ref");
  const catText = document.getElementById("lightbox-cat");

  const prevBtn = document.querySelector(".lightbox-prev");
  const nextBtn = document.querySelector(".lightbox-next");

  // Variables globales
  window.galleryPhotos = []; // Stockera les photos à afficher
  window.currentIndex = 0;   // Index de la photo active

  // Fonction pour afficher la photo dans la lightbox
  function updateLightbox(index) {
    const photo = window.galleryPhotos[index];
    if (!photo || !photo.img) {
      console.warn("Photo introuvable ou incomplète :", index, photo);
      return;
    }

    // Réinitialisation
    lightboxImg.src = "";
    refText.textContent = "";
    catText.textContent = "";

    // Mise à jour
    lightboxImg.src = photo.img;
    refText.textContent = photo.ref
      ? "Référence: " + photo.ref
      : "Référence non définie";

    catText.textContent = photo.cat
      ? "Catégorie: " + photo.cat
      : "Catégorie non définie";

    lightbox.classList.remove("hidden");
  }

  // Fonction globale pour attacher les événements aux .icon-fullscreen (réutilisable après AJAX)
  window.initLightbox = function () {
    window.galleryPhotos = [];
    const fullscreenLinks = document.querySelectorAll(".icon-fullscreen");

    fullscreenLinks.forEach((link, index) => {
      const photo = {
        img: link.dataset.img || null,
        ref: link.dataset.ref || null,
        cat: link.dataset.cat || null
      };

      window.galleryPhotos.push(photo);

      link.setAttribute("data-index", index);

      link.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation(); // Empêche la fermeture accidentelle
        window.currentIndex = index;
        updateLightbox(index);
      });
    });
  };

  // Initialisation des boutons navigation
  prevBtn.addEventListener("click", function (e) {
    e.stopPropagation();
    window.currentIndex =
      (window.currentIndex - 1 + window.galleryPhotos.length) %
      window.galleryPhotos.length;
    updateLightbox(window.currentIndex);
  });

  nextBtn.addEventListener("click", function (e) {
    e.stopPropagation();
    window.currentIndex = (window.currentIndex + 1) % window.galleryPhotos.length;
    updateLightbox(window.currentIndex);
  });

  // Fermeture via bouton ✕
  closeBtn.addEventListener("click", function () {
    lightbox.classList.add("hidden");
    lightboxImg.src = "";
  });

  // Fermeture en cliquant sur le fond
  lightbox.addEventListener("click", function (e) {
    if (
      e.target === lightbox ||
      e.target.classList.contains("lightbox-overlay")
    ) {
      lightbox.classList.add("hidden");
      lightboxImg.src = "";
    }
  });

  // 🔁 Appel initial au chargement de la page
  window.initLightbox();
});
