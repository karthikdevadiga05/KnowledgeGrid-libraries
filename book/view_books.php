
<?php
$page_css = '/KnowledgeGrid-Libraries/book/css/view_books.css';
include_once '../includes/header.php';
?>
<main>
    <section class="page-content container">
        <div class="search-section">
            <h1>Find Your Next Read</h1>
            <p>Search our entire collection and filter by your favorite genres.</p>
            <div class="search-bar">
                <i class="fa-solid fa-search"></i>
                <input type="search" id="book-search-input" placeholder="Search by title or description...">
            </div>
        </div>

        <!-- GENRE FILTER CAROUSEL -->
        <div class="genre-carousel">
            <button class="genre-btn active" data-genre="all">All</button>
            <button class="genre-btn" data-genre="fiction">Fiction</button>
            <button class="genre-btn" data-genre="mystery">Mystery</button>
            <button class="genre-btn" data-genre="science">Science</button>
            <button class="genre-btn" data-genre="history">History</button>
            <button class="genre-btn" data-genre="biography">Biography</button>
            <button class="genre-btn" data-genre="non-fiction">Non-Fiction</button>
            <button class="genre-btn" data-genre="fantasy">Fantasy</button>
        </div>

        <!-- BOOKS GRID -->
        <div class="books-grid" id="books-grid">
            <!-- Books will be dynamically filtered here -->
            <div class="book-card" data-genre="mystery">
                <img src="https://images.unsplash.com/photo-1588666301433-1428a49c4033?w=500&auto=format&fit=crop" alt="Book cover for Mystery of the Old Mansion" class="book-cover-image">
                <div class="book-card-content">
                    <h3>Mystery of the Old Mansion</h3>
                    <p class="description">A thrilling whodunit set in a remote, forgotten estate with a dark past.</p>
                    <a href="#" class="btn">View Book</a>
                </div>
            </div>
                <div class="book-card" data-genre="fiction">
                <img src="https://images.unsplash.com/photo-1611689103233-39a7d30560a0?w=500&auto=format&fit=crop" alt="Book cover for The Great Adventure" class="book-cover-image">
                <div class="book-card-content">
                    <h3>The Great Adventure</h3>
                    <p class="description">An epic journey across uncharted lands, filled with danger and discovery.</p>
                    <a href="#" class="btn">View Book</a>
                </div>
            </div>
            <div class="book-card" data-genre="science">
                <img src="https://images.unsplash.com/photo-1581373449483-348a83a45c0f?w=500&auto=format&fit=crop" alt="Book cover for A History of Time" class="book-cover-image">
                <div class="book-card-content">
                    <h3>A History of Time</h3>
                    <p class="description">An exploration of the universe, from the big bang to black holes.</p>
                    <a href="#" class="btn">View Book</a>
                </div>
            </div>
            <div class="book-card" data-genre="non-fiction">
                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=500&auto=format&fit=crop" alt="Book cover for Cooking for Beginners" class="book-cover-image">
                <div class="book-card-content">
                    <h3>Cooking for Beginners</h3>
                    <p class="description">Master the basics of cooking with over 100 simple and delicious recipes.</p>
                    <a href="#" class="btn">View Book</a>
                </div>
            </div>
                <div class="book-card" data-genre="fantasy">
                <img src="https://images.unsplash.com/photo-1579487785973-74d2ca7abdd5?w=500&auto=format&fit=crop" alt="Book cover for The Dragon's Prophecy" class="book-cover-image">
                <div class="book-card-content">
                    <h3>The Dragon's Prophecy</h3>
                    <p class="description">A young hero must unite a divided kingdom against an ancient evil.</p>
                    <a href="#" class="btn">View Book</a>
                </div>
            </div>
            <div class="book-card" data-genre="history">
                <img src="https://images.unsplash.com/photo-1474366521946-c3d4b508a3f0?w=500&auto=format&fit=crop" alt="Book cover for The Roman Empire" class="book-cover-image">
                <div class="book-card-content">
                    <h3>The Roman Empire</h3>
                    <p class="description">A detailed account of the rise and fall of one of history's greatest civilizations.</p>
                    <a href="#" class="btn">View Book</a>
                </div>
            </div>
                <div class="book-card" data-genre="biography">
                <img src="https://images.unsplash.com/photo-1513001900722-370f803f498d?w=500&auto=format&fit=crop" alt="Book cover for The Inventor's Life" class="book-cover-image">
                <div class="book-card-content">
                    <h3>The Inventor's Life</h3>
                    <p class="description">The inspiring story of a brilliant mind who changed the world with her creations.</p>
                    <a href="#" class="btn">View Book</a>
                </div>
            </div>
            <div class="book-card" data-genre="fiction">
                <img src="https://images.unsplash.com/photo-1521123845562-34a0d9221355?w=500&auto=format&fit=crop" alt="Book cover for Echoes of the Future" class="book-cover-image">
                <div class="book-card-content">
                    <h3>Echoes of the Future</h3>
                    <p class="description">A mind-bending science fiction novel about time travel and its consequences.</p>
                    <a href="#" class="btn">View Book</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
$page_script = '/KnowledgeGrid-Libraries/book/js/view_books.js';
require_once '../includes/footer.php';
?>