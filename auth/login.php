<?php
$page_css = '/KnowledgeGrid-Libraries/assets/css/login.css';
include_once '../includes/header.php';
?>
    <!-- MAIN CONTENT -->
    <main class="form-page-container">
        <div class="auth-form">
            <h2>Login to Your Account</h2>
            
            <?php if (!empty($error_message)) : ?>
                <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>

            <form action="login_page.php" method="POST">
                
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="you@example.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>

                <p class="register-link">
                    New user? <a href="login.php">Register here</a>.
                </p>
            </form>
        </div>
    </main>
<?php include_once '../includes/footer.php'; ?>