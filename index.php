<?php
    include_once 'includes/header.php';
?>
<!-- hero section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Welcome to KnowledgeGrid</h1>
            <p class="hero-subtitle">Your gateway to a world of information, right in your community.</p>
            <a href="#libraries" class="btn hero-btn">Find Your Library</a>
        </div>
    </section>

<!-- main section -->
    <main class="site-main">

        <!-- 'Our Libraries' Section -->
        <section id="libraries" class="carousel-section">
            <div class="container">
                <h2>Our Libraries</h2>
                <div class="carousel-container">   
                    <!-- TEMPLATE CARD -->
                    <div class="card library-card">
                        <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=500&auto=format&fit=crop&q=60" alt="Interior of a modern library" class="card-image">
                        <div class="card-content">
                            <h3>KnowledgeGrid Bangalore</h3>
                            <p>123 Tech Park, Electronic City</p>
                            <a href="#" class="btn btn-secondary">View Details</a>
                        </div>
                    </div>
                    <!-- End Template Card -->

                    <div class="card library-card">
                        <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=500&auto=format&fit=crop&q=60" alt="Library aisle with many books" class="card-image">
                        <div class="card-content">
                            <h3>KnowledgeGrid Mumbai</h3>
                            <p>456 Marine Drive, Colaba</p>
                            <a href="#" class="btn btn-secondary">View Details</a>
                        </div>
                    </div>
                    <div class="card library-card">
                        <img src="https://images.unsplash.com/photo-1531988042231-E09b3cc4c92a?w=500&auto=format&fit=crop&q=60" alt="Student studying in a library" class="card-image">
                        <div class="card-content">
                            <h3>KnowledgeGrid Delhi</h3>
                            <p>789 Connaught Place, New Delhi</p>
                            <a href="#" class="btn btn-secondary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 'Genre' Section -->
        <section id="genres" class="carousel-section alt-bg">
            <div class="container">
                <h2>Browse by Genre</h2>
                <div class="carousel-container">
                    <a href="#" class="card genre-card">
                        <img src="https://images.unsplash.com/photo-1550399105-c4db5fb85c18?w=500&auto=format&fit=crop&q=60" alt="" class="card-image" aria-hidden="true">
                        <div class="card-overlay"><h3>Fiction</h3></div>
                    </a>
                    <a href="#" class="card genre-card">
                        <img src="https://images.unsplash.com/photo-1509395032112-617d3a81702f?w=500&auto=format&fit=crop&q=60" alt="" class="card-image" aria-hidden="true">
                        <div class="card-overlay"><h3>Science</h3></div>
                    </a>
                    <a href="#" class="card genre-card">
                        <img src="https://images.unsplash.com/photo-1447023843483-6f0fef32b35c?w=500&auto=format&fit=crop&q=60" alt="" class="card-image" aria-hidden="true">
                        <div class="card-overlay"><h3>History</h3></div>
                    </a>
                    <a href="#" class="card genre-card">
                        <img src="https://images.unsplash.com/photo-1510362310834-3f16f306c3a5?w=500&auto=format&fit=crop&q=60" alt="" class="card-image" aria-hidden="true">
                        <div class="card-overlay"><h3>Biography</h3></div>
                    </a>
                </div>
            </div>
        </section>

        <!-- 'Explore book' Section -->
        <section id="explore" class="explore-section">
            <div class="container">
                <h2>Explore Our Full Collection</h2>
                <p>Find your next great read from thousands of titles available across India.</p>
                <a href="#" class="btn btn-primary">Explore All Books</a>
                <p class="explore-note">
                    <strong>Please Note:</strong> You can only borrow a book which is available in your nearest library. Otherwise, you can only purchase them.
                </p>
            </div>
        </section>

    </main>

<?php
    require 'includes/footer.php';
?>
