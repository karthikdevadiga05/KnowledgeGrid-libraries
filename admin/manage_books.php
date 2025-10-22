<?php
$page_css = '/KnowledgeGrid-Libraries/admin/css/manage_books.css';
include_once '../includes/header.php';
if (!is_admin_logged_in()): header('Location: /KnowledgeGrid-Libraries/auth/login.php'); exit; endif;
?>

<main class="container" aria-labelledby="books-manage-title">
    <h1 id="books-manage-title">Manage Books</h1>
    <?php
    // Create / Update book
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['form'] ?? '') === 'book') {
        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $genre = trim($_POST['genre'] ?? '');
        $isbn = trim($_POST['isbn'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;
        
        if ($title !== '' && $author !== '') {
            if ($id) {
                $stmt = $conn->prepare('UPDATE books SET title=?, author=?, genre=?, isbn=?, description=? WHERE id=?');
                $stmt->bind_param('sssssi', $title, $author, $genre, $isbn, $description, $id);
                $stmt->execute();
            } else {
                $stmt = $conn->prepare('INSERT INTO books (title, author, genre, isbn, description) VALUES (?,?,?,?,?)');
                $stmt->bind_param('sssss', $title, $author, $genre, $isbn, $description);
                $stmt->execute();
            }
        }
        header('Location: manage_books.php');
        exit;
    }

    // Map book to library with availability & price
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['form'] ?? '') === 'map') {
        $book_id = (int)($_POST['book_id'] ?? 0);
        $library_id = (int)($_POST['library_id'] ?? 0);
        $available = (int)($_POST['available'] ?? 0);
        $price = (float)($_POST['price'] ?? 0);
        
        if ($book_id > 0 && $library_id > 0) {
            // Upsert logic
            $stmt = $conn->prepare('SELECT id FROM library_books WHERE library_id=? AND book_id=?');
            $stmt->bind_param('ii', $library_id, $book_id);
            $stmt->execute();
            $exists = $stmt->get_result()->fetch_assoc();
            
            if ($exists) {
                $stmt = $conn->prepare('UPDATE library_books SET available_count=?, price=? WHERE id=?');
                $id = (int)$exists['id'];
                $stmt->bind_param('idi', $available, $price, $id);
                $stmt->execute();
            } else {
                $stmt = $conn->prepare('INSERT INTO library_books (library_id, book_id, available_count, price) VALUES (?,?,?,?)');
                $stmt->bind_param('iiid', $library_id, $book_id, $available, $price);
                $stmt->execute();
            }
        }
        header('Location: manage_books.php');
        exit;
    }

    // Delete book
    if (isset($_GET['delete'])) {
        $bid = (int)$_GET['delete'];
        // Use prepared statements for delete operations
        $stmt = $conn->prepare('DELETE FROM library_books WHERE book_id = ?');
        $stmt->bind_param('i', $bid);
        $stmt->execute();
        
        $stmt = $conn->prepare('DELETE FROM books WHERE id = ?');
        $stmt->bind_param('i', $bid);
        $stmt->execute();
        
        header('Location: manage_books.php');
        exit;
    }
    ?>

    <section aria-labelledby="book-form-title">
        <h2 id="book-form-title">Add Book</h2>
        <form method="post" novalidate>
            <input type="hidden" name="form" value="book">
            <div>
                <label for="title">Title</label>
                <input id="title" name="title" required>
            </div>
            <div>
                <label for="author">Author</label>
                <input id="author" name="author" required>
            </div>
            <div class="stack-sm">
                <div style="flex:1">
                    <label for="genre">Genre</label>
                    <input id="genre" name="genre">
                </div>
                <div style="flex:1">
                    <label for="isbn">ISBN</label>
                    <input id="isbn" name="isbn">
                </div>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </section>

    <section aria-labelledby="books-list-title" style="margin-top:1rem">
        <h2 id="books-list-title">Books</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $conn->prepare('SELECT id, title, author, genre FROM books ORDER BY title');
                $stmt->execute();
                $result = $stmt->get_result();
                while($book = $result->fetch_assoc()): 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['genre']); ?></td>
                    <td class="stack-sm">
                        <a class="badge" href="manage_books.php?delete=<?php echo (int)$book['id']; ?>" 
                           onclick="return confirm('Delete this book?');">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <form class="stack-sm" method="post" aria-label="Map book to library">
                            <input type="hidden" name="form" value="map">
                            <input type="hidden" name="book_id" value="<?php echo (int)$book['id']; ?>">
                            <div style="flex:2">
                                <label for="lib-<?php echo (int)$book['id']; ?>">Library</label>
                                <select id="lib-<?php echo (int)$book['id']; ?>" name="library_id" required>
                                    <?php 
                                    $libs = $conn->query('SELECT id, name, city FROM libraries ORDER BY name'); 
                                    while($lib = $libs->fetch_assoc()): 
                                    ?>
                                        <option value="<?php echo (int)$lib['id']; ?>">
                                            <?php echo htmlspecialchars($lib['name'].' ('.$lib['city'].')'); ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div style="flex:1">
                                <label for="avail-<?php echo (int)$book['id']; ?>">Available</label>
                                <input id="avail-<?php echo (int)$book['id']; ?>" 
                                       name="available" type="number" min="0" value="5">
                            </div>
                            <div style="flex:1">
                                <label for="price-<?php echo (int)$book['id']; ?>">Price (₹)</label>
                                <input id="price-<?php echo (int)$book['id']; ?>" 
                                       name="price" type="number" step="0.01" min="0" value="250">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Mapping</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</main>

<?php
$page_script = '/KnowledgeGrid-Libraries/admin/js/manage_books.js';
include_once '../includes/footer.php';
?>