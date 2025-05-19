console.log("Lightbox JS chargé !");
document.addEventListener("DOMContentLoaded", function () {
  const fullscreenLinks = document.querySelectorAll(".icon-fullscreen");
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightbox-image");
  const closeBtn = document.getElementById("lightbox-close");
  const refText = document.getElementById("lightbox-ref");
  const catText = document.getElementById("lightbox-cat");

  const prevBtn = document.querySelector(".lightbox-prev");
  const nextBtn = document.querySelector(".lightbox-next");

  let galleryPhotos = [];
  let currentIndex = 0;

  // Récupère les données depuis chaque lien fullscreen
  fullscreenLinks.forEach((link, index) => {
    console.log(`Index ${index} :`, {
    img: link.dataset.img,
    ref: link.dataset.ref,
    cat: link.dataset.cat
    });

    galleryPhotos.push({
      img: link.dataset.img || null,
      ref: link.dataset.ref || null,
      cat: link.dataset.cat || null
    });

    link.setAttribute("data-index", index);

    link.addEventListener("click", function (e) {
      e.preventDefault();
      currentIndex = index;
      updateLightbox(currentIndex);
    });
  });

  // Fonction d'affichage d'une image dans la lightbox
  function updateLightbox(index) {
  const photo = galleryPhotos[index];

  if (!photo || !photo.img) {
    console.warn("Photo introuvable ou incomplète à l’index", index, photo);
    return;
  }

  console.log("Image affichée :", photo.ref, "| Index :", index);

  // Mise à jour propre
  lightboxImg.src = "";
  refText.textContent = "";
  catText.textContent = "";

  setTimeout(() => {
    lightboxImg.src = photo.img;

    // Sécurité supplémentaire
    refText.textContent = photo.ref
      ? "REF. " + photo.ref
      : "REF. non défini";

    catText.textContent = photo.cat || "non définie";
    lightbox.classList.remove("hidden");
  }, 50);
}


  // Navigation ← photo précédente
  prevBtn.addEventListener("click", function (e) {
    e.stopPropagation();
    currentIndex = (currentIndex - 1 + galleryPhotos.length) % galleryPhotos.length;
    updateLightbox(currentIndex);
  });

  // Navigation → photo suivante
  nextBtn.addEventListener("click", function (e) {
    e.stopPropagation();
    currentIndex = (currentIndex + 1) % galleryPhotos.length;
    updateLightbox(currentIndex);
  });

  // Fermeture ✕
  closeBtn.addEventListener("click", function () {
    lightbox.classList.add("hidden");
    lightboxImg.src = "";
  });

  // Fermeture en cliquant sur le fond noir
  lightbox.addEventListener("click", function (e) {
    if (e.target === lightbox || e.target.classList.contains("lightbox-overlay")) {
      lightbox.classList.add("hidden");
      lightboxImg.src = "";
    }
  });
});
