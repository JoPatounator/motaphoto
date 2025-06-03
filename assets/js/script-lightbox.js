console.log("Lightbox JS chargé !");

document.addEventListener("DOMContentLoaded", function () {
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightbox-image");
  const closeBtn = document.getElementById("lightbox-close");
  const refText = document.getElementById("lightbox-ref");
  const catText = document.getElementById("lightbox-cat");

  const prevBtn = document.querySelector(".lightbox-prev");
  const nextBtn = document.querySelector(".lightbox-next");
  const navPrev = document.querySelector(".lightbox-prev");
  const navNext = document.querySelector(".lightbox-next");
  const navContainer = document.createElement("div");
  navContainer.classList.add("lightbox-nav-bottom");

  // Variables globales
  window.galleryPhotos = []; // Tab qui contiendra les photos a afficher
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

    // Réorganisation des flèches si écran < 1440px
    const navPrev = document.querySelector(".lightbox-prev");
    const navNext = document.querySelector(".lightbox-next");
    const metaZone = document.querySelector(".lightbox-meta");

    if (window.innerWidth < 1440) {
      let navContainer = document.querySelector(".lightbox-nav-bottom");

      // Création du conteneur si absent
      if (!navContainer) {
        navContainer = document.createElement("div");
        navContainer.classList.add("lightbox-nav-bottom");
        metaZone.parentNode.appendChild(navContainer);
      }

      // On déplace les boutons dans ce conteneur
      navContainer.innerHTML = ""; // reset
      navContainer.appendChild(navPrev);
      navContainer.appendChild(navNext);
    } else {
      //  Replacer dans .lightbox pour un ciblage CSS correct
      const lightbox = document.getElementById("lightbox");
      lightbox.appendChild(navPrev);
      lightbox.appendChild(navNext);

      //  Supprime le conteneur mobile s’il existe encore
      const navContainer = document.querySelector(".lightbox-nav-bottom");
      if (navContainer) navContainer.remove();
    }



    adjustNavPosition();
  }

  // Fonction globale pour attacher les événements aux .icon-fullscreen
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
        e.stopPropagation();
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

  // Fonction de repositionnement responsive
  function adjustNavPosition() {
    if (window.innerWidth < 1440) {
      // Déplacer les boutons dans un bloc en bas
      if (!document.querySelector(".lightbox-nav-bottom")) {
        navContainer.appendChild(navPrev);
        navContainer.appendChild(navNext);
        document.querySelector(".lightbox-inner").appendChild(navContainer);
      }
    } else {
      // Remettre les boutons à leur place initiale si besoin (refresh ou agrandissement)
      if (document.querySelector(".lightbox-nav-bottom")) {
        document.querySelector(".lightbox").appendChild(navPrev);
        document.querySelector(".lightbox").appendChild(navNext);
        navContainer.remove();
      }
    }
  }

  window.addEventListener("resize", adjustNavPosition);

  // Appel initial au chargement de la page
  window.initLightbox();
});
