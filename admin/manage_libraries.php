<?php
$page_css = '/KnowledgeGrid-Libraries/admin/css/manage_libraries.css';
include_once '../includes/header.php';
if (!is_admin_logged_in()): header('Location: /KnowledgeGrid-Libraries/auth/login.php'); exit; endif;
?>

<main class="container" aria-labelledby="lib-manage-title">
    <h1 id="lib-manage-title">Manage Libraries</h1>
    
    <?php if (isset($_GET['success'])): ?>
        <div class="form-success" role="alert">
            <?php echo $_GET['success'] == 1 ? 'Library updated successfully!' : 'Library deleted successfully!'; ?>
        </div>
    <?php endif; ?>

    <section aria-labelledby="lib-form-title" class="form-section">
        <h2 id="lib-form-title"><?php echo isset($_GET['edit']) ? 'Edit Library' : 'Add Library'; ?></h2>
        <form method="post" novalidate class="library-form">
            <?php if (isset($_GET['edit'])): ?>
                <input type="hidden" name="id" value="<?php echo (int)$_GET['edit']; ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="name">Library Name</label>
                <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($edit['name'] ?? ''); ?>" placeholder="Enter library name">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required value="<?php echo htmlspecialchars($edit['city'] ?? ''); ?>" placeholder="Enter city name">
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" required value="<?php echo htmlspecialchars($edit['state'] ?? ''); ?>" placeholder="Enter state name">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <?php echo isset($_GET['edit']) ? 'Update Library' : 'Add Library'; ?>
                </button>
                <?php if (isset($_GET['edit'])): ?>
                    <a href="manage_libraries.php" class="btn btn-secondary">Cancel</a>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <section aria-labelledby="lib-list-title" class="libraries-section">
        <h2 id="lib-list-title">Libraries</h2>
        
        <div class="libraries-grid">
            <?php 
            $stmt = $conn->prepare('SELECT id, name, city, state FROM libraries ORDER BY name');
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows === 0): ?>
                <p class="no-libraries">No libraries found. Add your first library above.</p>
            <?php endif;

            while($lib = $result->fetch_assoc()): ?>
                <div class="library-card">
                    <div class="library-card-content">
                        <h3 class="library-name"><?php echo htmlspecialchars($lib['name']); ?></h3>
                        <div class="library-details">
                            <p class="library-location">
                                <i class="fas fa-location-dot"></i>
                                <?php echo htmlspecialchars($lib['city'] . ', ' . $lib['state']); ?>
                            </p>
                        </div>
                    </div>
                    <div class="library-card-actions">
                        <a href="manage_libraries.php?edit=<?php echo (int)$lib['id']; ?>" 
                           class="btn btn-edit" 
                           title="Edit library">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="manage_libraries.php?delete=<?php echo (int)$lib['id']; ?>" 
                           class="btn btn-delete" 
                           onclick="return confirm('Are you sure you want to delete this library? This will also remove all book mappings.');"
                           title="Delete library">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</main>


<?php include_once '../includes/footer.php'; ?>