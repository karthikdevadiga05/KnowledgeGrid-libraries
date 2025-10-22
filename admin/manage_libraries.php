<?php
$page_css = '/KnowledgeGrid-Libraries/admin/css/manage_libraries.css';
include_once '../includes/header.php';
if (!is_admin_logged_in()): header('Location: /KnowledgeGrid-Libraries/auth/login.php'); exit; endif;
?>
<main>
    <section class="page-content container">
        <h1>Manage Libraries</h1>

        <!-- ADD LIBRARY FORM -->
        <section class="management-section">
            <h2>Add Library</h2>
            <form id="addLibraryForm" novalidate aria-labelledby="formTitle">
                <div class="form-group">
                    <label for="name" id="nameLabel">Name</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required 
                           minlength="3"
                           aria-required="true"
                           aria-labelledby="nameLabel"
                           aria-describedby="nameError">
                    <span id="nameError" class="error-message" role="alert"></span>
                </div>
                <div class="form-group">
                    <label for="city" id="cityLabel">City</label>
                    <input type="text" 
                           id="city" 
                           name="city" 
                           required
                           minlength="2"
                           aria-required="true"
                           aria-labelledby="cityLabel"
                           aria-describedby="cityError">
                    <span id="cityError" class="error-message" role="alert"></span>
                </div>
                <div class="form-group">
                    <label for="state" id="stateLabel">State</label>
                    <input type="text" 
                           id="state" 
                           name="state" 
                           required
                           minlength="2"
                           aria-required="true"
                           aria-labelledby="stateLabel"
                           aria-describedby="stateError">
                    <span id="stateError" class="error-message" role="alert"></span>
                </div>
                <button type="submit" 
                        class="btn btn-primary"
                        aria-label="Create new library">Create</button>
            </form>
        </section>

        <!-- LIBRARIES TABLE -->
        <section>
            <h2>Libraries</h2>
            <div class="table-container">
                <table class="libraries-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Central City Library</td>
                            <td>Bengaluru</td>
                            <td>Karnataka</td>
                            <td class="action-cell">
                                <button class="btn btn-edit">Edit</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                            <tr>
                            <td>Coastal Reads Library</td>
                            <td>Chennai</td>
                            <td>Tamil Nadu</td>
                            <td class="action-cell">
                                <button class="btn btn-edit">Edit</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Downtown Knowledge Hub</td>
                            <td>Dharwad</td>
                            <td>Karnataka</td>
                            <td class="action-cell">
                                <button class="btn btn-edit">Edit</button>
                                <button class="btn btn-delete">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </section>

    </section>
</main>

<!-- form validation script -->
<script src="/KnowledgeGrid-Libraries/admin/js/manage_libraries.js"></script>

<!-- Add some CSS for error states -->


<?php
include_once '../includes/footer.php';
?>