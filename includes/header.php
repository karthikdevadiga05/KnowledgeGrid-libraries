<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();
require_once __DIR__ . '/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KnowledgeGrid Libraries</title>
    <!-- Font Awesome for icons (hamburger, login, etc.) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Common css file -->
    <link rel="stylesheet" href="/KnowledgeGrid-Libraries/assets/css/style.css">
    <!-- Custom css file (modules specific) -->
    <?php if (!empty($page_css)): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($page_css); ?>">
    <?php endif; ?>

</head>
<body>
    <header class="site-header">
        <div class="container header-container">
            <!-- Left Side: Logo and Company Name -->
            <a href="index.html" class="logo-container">
                <i class="fa-solid fa-book-open-reader logo-icon"></i>
                <span class="company-name">KnowledgeGrid</span>
            </a>
            

            <!-- Middle: Navigation Links -->
            <nav class="main-nav" id="main-nav">
                <ul class="nav-links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Locations</a></li>
                    <li><a href="#">Explore</a></li>
                </ul>
            </nav>

            <!-- Right Side: Login/Logout and Hamburger -->
            <div class="header-right">
                <?php if (is_admin_logged_in()): ?>
                        <span class="btn btn-login" title="You are logged in as admin">Admin</span>
                        <a href="/KnowledgeGrid-Libraries/modules/library_management/manage_library.php"
                            class="btn btn-login">Manage Libraries</a>
                        <a href="/KnowledgeGrid-Libraries/modules/book_management/manage_books.php" class="btn btn-login">Manage
                            Books</a>
                    <?php endif; ?>
                    <?php if (is_user_logged_in()): ?>
                        <span class="muted">Hello, <?php echo htmlspecialchars(current_user_name()); ?></span>
                        <a href="/KnowledgeGrid-Libraries/modules/borrow_purchase/my_books.php" class="btn btn-login">My Books</a>
                        <a href="/KnowledgeGrid-Libraries/auth/logout.php" class="btn btn-login" aria-label="Logout"><i
                                class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> Logout</a>
                    <?php else: ?>
                        <a href="/KnowledgeGrid-Libraries/auth/login.php" class="btn btn-login"><i class="fa-solid fa-user"
                                aria-hidden="true"></i>
                            Login</a>
                        <a href="/KnowledgeGrid-Libraries/auth/register.php" class="btn btn-login"><i class="fa-solid fa-user-plus"
                                aria-hidden="true"></i> Register</a>
                    <?php endif; ?>
                <button class="hamburger" id="hamburger-btn" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="main-nav">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>