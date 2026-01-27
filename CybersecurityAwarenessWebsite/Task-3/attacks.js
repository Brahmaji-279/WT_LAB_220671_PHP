//attacks page
confirm(
    "This page explains you the different types of cyber attacks and their brief descriptions"
)
document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.attack-link');
    links.forEach(link => {
        const card = link.querySelector('.attack-card');
        const id = link.href;
        if (localStorage.getItem(id)) {
            card.classList.add('visited');
        }
        link.addEventListener('pointerdown', () => {
            localStorage.setItem(id, 'visited');
            card.classList.add('visited');
        });
    });
});