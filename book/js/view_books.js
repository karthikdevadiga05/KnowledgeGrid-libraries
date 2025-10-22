document.addEventListener('DOMContentLoaded', () => {

    // Genre Filtering & Search
    const genreButtons = document.querySelectorAll('.genre-btn');
    const bookCards = document.querySelectorAll('.book-card');
    const searchInput = document.getElementById('book-search-input');

    // Function to handle filtering
    const filterBooks = () => {
        const selectedGenre = document.querySelector('.genre-btn.active').dataset.genre;
        const searchTerm = searchInput.value.toLowerCase();

        bookCards.forEach(card => {
            const cardGenre = card.dataset.genre;
            const cardTitle = card.querySelector('h3').textContent.toLowerCase();
            const cardDescription = card.querySelector('.description').textContent.toLowerCase();

            const genreMatch = selectedGenre === 'all' || cardGenre === selectedGenre;
            const searchMatch = cardTitle.includes(searchTerm) || cardDescription.includes(searchTerm);

            if (genreMatch && searchMatch) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    };

    // Event listener for genre buttons
    genreButtons.forEach(button => {
        button.addEventListener('click', () => {
            genreButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            filterBooks();
        });
    });

    // Event listener for search input
    searchInput.addEventListener('input', filterBooks);
});