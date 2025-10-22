<?php
$page_css = '/KnowledgeGrid-Libraries/admin/css/manage_books.css';
include_once '../includes/header.php';
?>
<main>
    <section class="page-content container">
        <h1>Manage Books</h1>

        <!-- ADD BOOK FORM -->
        <section class="management-section">
            <h2>Add Book</h2>
            <form>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" required>
                    </div>
                        <div class="form-group">
                        <label for="genre">Genre</label>
                        <select id="genre" name="genre" required>
                            <option value="" disabled selected>Select a genre</option>
                            <option value="fiction">Fiction</option>
                            <option value="mystery">Mystery</option>
                            <option value="science">Science</option>
                            <option value="history">History</option>
                            <option value="biography">Biography</option>
                        </select>
                    </div>
                        <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" id="isbn" name="isbn" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="libraries">Assign to Libraries</label>
                        <!-- Hidden original select -->
                        <select id="libraries-select" name="libraries[]" multiple required>
                            <option value="1">Central City Library (Bengaluru)</option>
                            <option value="2">Coastal Reads Library (Chennai)</option>
                            <option value="3">Downtown Knowledge Hub (Dharwad)</option>
                            <option value="4">Historic Town Library (Hyderabad)</option>
                            <option value="5">Lakeside Community Library (Manipal)</option>
                            <option value="6">Mountainview Library (Kolkata)</option>
                            <option value="7">Riverside Public Library (Mumbai)</option>
                        </select>
                        <!-- Custom Dropdown -->
                        <div class="custom-multiselect">
                            <div class="select-box" id="custom-select-box">
                                <span>Select Libraries...</span>
                            </div>
                            <div class="options-container" id="options-container">
                                <label class="option"><input type="checkbox" value="1"> Central City Library (Bengaluru)</label>
                                <label class="option"><input type="checkbox" value="2"> Coastal Reads Library (Chennai)</label>
                                <label class="option"><input type="checkbox" value="3"> Downtown Knowledge Hub (Dharwad)</label>
                                <label class="option"><input type="checkbox" value="4"> Historic Town Library (Hyderabad)</label>
                                <label class="option"><input type="checkbox" value="5"> Lakeside Community Library (Manipal)</label>
                                <label class="option"><input type="checkbox" value="6"> Mountainview Library (Kolkata)</label>
                                <label class="option"><input type="checkbox" value="7"> Riverside Public Library (Mumbai)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group full-width">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </section>

        <!-- BOOKS TABLE -->
        <section>
            <h2>Books</h2>
            <div class="table-container">
                <table class="books-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cooking Made Easy</td>
                            <td>Chef Alex</td>
                            <td>Cooking</td>
                            <td class="action-cell">
                                <button class="btn btn-edit">Edit</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Mystery of the Old Mansion</td>
                            <td>Jane Doe</td>
                            <td>Mystery</td>
                            <td class="action-cell">
                                <button class="btn btn-edit">Edit</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                            <tr>
                            <td>The Great Adventure</td>
                            <td>John Smith</td>
                            <td>Fiction</td>
                            <td class="action-cell">
                                <button class="btn btn-edit">Edit</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </section>
</main>
<?php
    $page_script = '/KnowledgeGrid-Libraries/admin/js/manage_books.js';
    require_once '../includes/footer.php';
    
?>