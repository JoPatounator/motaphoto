document.addEventListener("DOMContentLoaded", function () {
  const filtreCategorie = document.getElementById("filtre-categorie");
  const filtreFormat = document.getElementById("filtre-format");
  const filtreTri = document.getElementById("filtre-tri");
  const boutonCharger = document.getElementById("bouton-charger-plus");
  const chargeur = document.getElementById("chargeur-photos");
  const container = document.querySelector(".photo-grid");

  let offset = 0;

  function chargerPhotosAvecFiltres(reinitialiser = true) {
    const categorie = filtreCategorie.value;
    const format = filtreFormat.value;
    const tri = filtreTri.value;

    if (reinitialiser) {
      offset = 0;
    }

    const data = new FormData();
    data.append("action", reinitialiser ? "filtrer_photos" : "charger_plus_photos");
    data.append("categorie", categorie);
    data.append("format", format);
    data.append("tri", tri);
    data.append("offset", offset);

    chargeur.style.display = "block";

    fetch(motaphotoajax.ajaxurl, {
      method: "POST",
      body: data
    })
      .then(response => response.text())
      .then(result => {
        if (reinitialiser) {
          container.innerHTML = result;
        } else {
          container.insertAdjacentHTML("beforeend", result);
        }

        // Mise à jour offset (8 de plus)
        offset += 8;

        // Réinitialiser la lightbox (important !)
        if (typeof initLightbox === "function") {
          initLightbox();
        }

        chargeur.style.display = "none";
      })
      .catch(error => {
        console.error("Erreur AJAX : ", error);
        chargeur.style.display = "none";
      });
  }

  // Initialisation
  chargerPhotosAvecFiltres(true);

  [filtreCategorie, filtreFormat, filtreTri].forEach(select => {
    select.addEventListener("change", () => {
      chargerPhotosAvecFiltres(true);
    });
  });

  boutonCharger.addEventListener("click", function () {
    chargerPhotosAvecFiltres(false);
  });
});
