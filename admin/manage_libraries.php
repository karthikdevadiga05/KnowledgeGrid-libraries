<?php
$page_css = '/KnowledgeGrid-Libraries/admin/css/manage_libraries.css';
include_once '../includes/header.php';
if (!is_admin_logged_in()): header('Location: /KnowledgeGrid-Libraries/auth/login.php'); exit; endif;
?>

<main class="container" aria-labelledby="lib-manage-title">
    <h1 id="lib-manage-title">Manage Libraries</h1>
    <?php
    // Create / Update
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $city = trim($_POST['city'] ?? '');
        $state = trim($_POST['state'] ?? '');
        $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;

        if ($name !== '' && $city !== '' && $state !== '') {
            if ($id) {
                $stmt = $conn->prepare('UPDATE libraries SET name=?, city=?, state=? WHERE id=?');
                $stmt->bind_param('sssi', $name, $city, $state, $id);
                $stmt->execute();
            } else {
                $stmt = $conn->prepare('INSERT INTO libraries (name, city, state) VALUES (?,?,?)');
                $stmt->bind_param('sss', $name, $city, $state);
                $stmt->execute();
            }
        }
        header('Location: manage_libraries.php');
        exit;
    }

    // Delete library
    if (isset($_GET['delete'])) {
        $did = (int)$_GET['delete'];
        // Use prepared statements for deletion
        $stmt = $conn->prepare('DELETE FROM library_books WHERE library_id = ?');
        $stmt->bind_param('i', $did);
        $stmt->execute();

        $stmt = $conn->prepare('DELETE FROM libraries WHERE id = ?');
        $stmt->bind_param('i', $did);
        $stmt->execute();

        header('Location: manage_libraries.php');
        exit;
    }

    // Edit fetch
    $edit = null;
    if (isset($_GET['edit'])) {
        $eid = (int)$_GET['edit'];
        $stmt = $conn->prepare('SELECT id, name, city, state FROM libraries WHERE id = ?');
        $stmt->bind_param('i', $eid);
        $stmt->execute();
        $result = $stmt->get_result();
        $edit = $result && $result->num_rows ? $result->fetch_assoc() : null;
    }
    ?>

    <section aria-labelledby="lib-form-title">
        <h2 id="lib-form-title"><?php echo $edit ? 'Edit Library' : 'Add Library'; ?></h2>
        <form method="post" novalidate>
            <?php if ($edit): ?>
                <input type="hidden" name="id" value="<?php echo (int)$edit['id']; ?>">
            <?php endif; ?>
            <div>
                <label for="name">Name</label>
                <input id="name" name="name" required 
                       value="<?php echo htmlspecialchars($edit['name'] ?? ''); ?>">
            </div>
            <div>
                <label for="city">City</label>
                <input id="city" name="city" required 
                       value="<?php echo htmlspecialchars($edit['city'] ?? ''); ?>">
            </div>
            <div>
                <label for="state">State</label>
                <input id="state" name="state" required 
                       value="<?php echo htmlspecialchars($edit['state'] ?? ''); ?>">
            </div>
            <button type="submit" class="btn btn-primary">
                <?php echo $edit ? 'Update' : 'Create'; ?>
            </button>
        </form>
    </section>

    <section aria-labelledby="lib-list-title" style="margin-top:1rem">
        <h2 id="lib-list-title">Libraries</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $conn->prepare('SELECT id, name, city, state FROM libraries ORDER BY name');
                $stmt->execute();
                $result = $stmt->get_result();
                while($lib = $result->fetch_assoc()): 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($lib['name']); ?></td>
                    <td><?php echo htmlspecialchars($lib['city']); ?></td>
                    <td><?php echo htmlspecialchars($lib['state']); ?></td>
                    <td class="stack-sm">
                        <a class="badge" href="manage_libraries.php?edit=<?php echo (int)$lib['id']; ?>">Edit</a>
                        <a class="badge" href="manage_libraries.php?delete=<?php echo (int)$lib['id']; ?>" 
                           onclick="return confirm('Delete this library?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</main>

<?php
$page_script = '/KnowledgeGrid-Libraries/admin/js/manage_libraries.js';
include_once '../includes/footer.php';
?>