
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne les éléments nécessaires
    const modaleContainer = document.getElementById('modale-container');
    const modale = document.getElementById('modale'); // Ajout d'une référence à la modale
    const openModalLinks = document.querySelectorAll('.open-modal');

    console.info('Variables modaleContainer et openModalLinks initialisées');

    // Ouvrir la modale lorsqu'un lien "Contact" est cliqué
    openModalLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien
            event.stopPropagation(); // Empêche la propagation de l'événement vers la fenêtre
            modaleContainer.classList.remove('hidden'); // Affiche la modale
            console.info('On a cliqué sur le lien Contact');
        });
    });

    // Fermer la modale lorsqu'on clique en dehors de celle-ci
    window.addEventListener('click', function (event) {
        console.info('On a cliqué dans la fenêtre du navigateur');

        // Vérifie si l'élément cliqué n'est ni un descendant de .modale-container ni un descendant de .modale
        if (!modaleContainer.contains(event.target) || !modale.contains(event.target)) {
            modaleContainer.classList.add('hidden'); // Masque la modale
            console.info('On a fermé la modale en cliquant en dehors');
        }
    });
});