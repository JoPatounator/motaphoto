
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne les éléments nécessaires
    const modaleContainer = document.getElementById('modale-container');
    const modale = document.getElementById('modale'); 
    const openModalLinks = document.querySelectorAll('.open-modal');

    console.info('Variables modaleContainer et openModalLinks initialisées');

    // Ouvrir la modale lorsque "Contact" est clique
    openModalLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // desactive comportement par défaut du lien
            event.stopPropagation(); // desactive la propagation de l'événement vers la fenêtre
            modaleContainer.classList.remove('hidden'); // Affiche la modale
            console.info('On a cliqué sur le lien Contact');
        });
    });

    // Fermer la modale lorsqu'on clique en dehors...
    window.addEventListener('click', function (event) {
        console.info('On a cliqué dans la fenêtre du navigateur');

        // Vérification si element clique n'est ni un descendant de .modale-container ni un descendant de .modale
        if (!modaleContainer.contains(event.target) || !modale.contains(event.target)) {
            modaleContainer.classList.add('hidden'); // Masque la modale
            console.info('On a fermé la modale en cliquant en dehors');
        }
    });
});