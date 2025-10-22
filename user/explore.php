
<?php
$page_css = '/KnowledgeGrid-Libraries/user/css/explore.css';
include_once '../includes/header.php';
?>
<main>
    <section class="explore-header">
        <div class="container">
            <h1>Explore Libraries & Books</h1>
            <p>Search publicly. Sign in to see books available at your nearest library.</p>
            <div class="search-bar">
                <i class="fa-solid fa-search"></i>
                <input type="search" placeholder="Search by title, author, or city">
            </div>
        </div>
    </section>
    
    <section class="page-content">
        <div class="container">
            <h2>Nearest Library</h2>
            <div class="library-card">
                <div class="library-card-content">
                    <div>
                        <h3>Central City Library</h3>
                        <div class="library-details">
                            <span><strong>City:</strong> Bengaluru</span>
                            <span><strong>State:</strong> Karnataka</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">View Library</a>
                </div>
            </div>

            <h2>Books Available Here</h2>
            <div class="books-grid">
                <!-- Book Card 1 -->
                <div class="book-card">
                    <img src="https://placehold.co/600x400/5e8de1/white?text=Mystery" alt="Cover of Mystery of the Old Mansion" class="book-cover-image">
                    <div class="book-card-content">
                        <h3>Mystery of the Old Mansion</h3>
                        <p class="author">by Jane Doe</p>
                        <div class="book-meta">
                            <span>Genre: Mystery</span>
                            <span>Available: 3</span>
                        </div>
                        <a href="#" class="btn btn-secondary">Details</a>
                    </div>
                </div>
                
                <!-- Book Card 2 -->
                <div class="book-card">
                    <img src="https://placehold.co/600x400/e15e68/white?text=Adventure" alt="Cover of The Great Adventure" class="book-cover-image">
                    <div class="book-card-content">
                        <h3>The Great Adventure</h3>
                        <p class="author">by John Smith</p>
                        <div class="book-meta">
                            <span>Genre: Fiction</span>
                            <span>Available: 5</span>
                        </div>
                        <a href="#" class="btn btn-secondary">Details</a>
                    </div>
                </div>
                
                <!-- Book Card 3 -->
                <div class="book-card">
                    <img src="https://placehold.co/600x400/6de15e/white?text=Science" alt="Cover of A History of Time" class="book-cover-image">
                    <div class="book-card-content">
                        <h3>A History of Time</h3>
                        <p class="author">by Clara Oswald</p>
                        <div class="book-meta">
                            <span>Genre: Science</span>
                            <span>Available: 1</span>
                        </div>
                        <a href="#" class="btn btn-secondary">Details</a>
                    </div>
                </div>
                
                <!-- Book Card 4 -->
                <div class="book-card">
                    <img src="https://placehold.co/600x400/e1d05e/white?text=Cooking" alt="Cover of Cooking for Beginners" class="book-cover-image">
                    <div class="book-card-content">
                        <h3>Cooking for Beginners</h3>
                        <p class="author">by Gordon Ramsay</p>
                        <div class="book-meta">
                            <span>Genre: Non-Fiction</span>
                            <span>Available: 8</span>
                        </div>
                        <a href="#" class="btn btn-secondary">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once '../includes/footer.php'; ?>