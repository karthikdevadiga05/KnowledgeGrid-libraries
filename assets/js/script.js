document.addEventListener('DOMContentLoaded', () => {
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mainNav = document.getElementById('main-nav');

    if (hamburgerBtn && mainNav) {
        hamburgerBtn.addEventListener('click', () => {
            mainNav.classList.toggle('is-active');
            const isExpanded = mainNav.classList.contains('is-active');
            hamburgerBtn.setAttribute('aria-expanded', isExpanded);
        });
    }
});
