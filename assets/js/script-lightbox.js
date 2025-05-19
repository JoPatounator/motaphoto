console.log("Lightbox JS chargé !");
document.addEventListener("DOMContentLoaded", function () {
  const fullscreenLinks = document.querySelectorAll(".icon-fullscreen");
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightbox-image");
  const closeBtn = document.getElementById("lightbox-close");

  fullscreenLinks.forEach(link => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const imgUrl = this.getAttribute("data-img");
      const ref = this.getAttribute("data-ref");
      const cat = this.getAttribute("data-cat");

      lightboxImg.src = imgUrl;
      document.getElementById("lightbox-ref").textContent = "Référence: " + ref;
      document.getElementById("lightbox-cat").textContent = "Catégorie: " + cat;
      lightbox.classList.remove("hidden");
    });
  });

  closeBtn.addEventListener("click", function () {
    lightbox.classList.add("hidden");
    lightboxImg.src = "";
  });

  // Fermer si clic en dehors de l'image
  lightbox.addEventListener("click", function (e) {
    if (e.target === lightbox || e.target.classList.contains("lightbox-overlay")) {
      lightbox.classList.add("hidden");
      lightboxImg.src = "";
    }
  });
});
