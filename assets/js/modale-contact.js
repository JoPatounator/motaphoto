
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne les éléments nécessaires
    const isSinglePhoto = document.body.classList.contains('single-photo');  // Vérifier si nous sommes sur une page de photo individuelle
    const modaleContainer = document.getElementById('modale-container');
    const modale = document.getElementById('modale'); 
    const openModalLinks = document.querySelectorAll('.open-modal');
    //console.info(document.body.classList.toString);

    console.info('Variables modaleContainer et openModalLinks initialisées');



    if (isSinglePhoto) {
        console.info(`!!!!!!!!!! On est dans un element single photo !!!!!!!!!!!!`);

        const refPhoto = photoData.ref; // Récupère la valeur depuis PHP
        const refField = document.getElementById('your-subject');
        refField.value = refPhoto;
        console.info(`Injection reference photo: ${refPhoto} dans le formulaire`);

    }
    // Ouvrir la modale lorsque "Contact" est clique
    openModalLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // desactive comportement par défaut du lien
            event.stopPropagation(); // desactive la propagation de l'événement vers la fenêtre
            modaleContainer.classList.remove('hidden'); // Affiche la modale
            // Ajout classe pour animation
            modaleContainer.querySelector('.modale').classList.add('animate-modal');
            console.info('On a cliqué sur le lien Contact');
        });
    });

    // Fermer la modale lorsqu'on clique en dehors...
    window.addEventListener('click', function (event) {
        console.info('On a cliqué dans la fenêtre du navigateur');

        // Vérification si element clique n'est ni un descendant de .modale-container ni un descendant de .modale
        if (!modaleContainer.contains(event.target) || !modale.contains(event.target)) {
            modale.classList.remove('animate-modal', 'closing'); // Ajoute une animation de sortie avant de masquer
            modaleContainer.classList.add('hidden'); // Masque la modale
            console.info('On a fermé la modale en cliquant en dehors');
        }
    });
});