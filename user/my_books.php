<?php
$page_css = '/KnowledgeGrid-Libraries/user/css/my_books.css';
include_once '../includes/header.php';
?>
<main>
    <section class="page-content">
        <div class="container">
            <div class="page-header">
                <h1>My Books</h1>
                <p>Your borrow requests and purchases.</p>
            </div>

            <div class="table-container">
                <table class="books-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Library</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>The Great Adventure</td>
                            <td>Borrow</td>
                            <td>Central City Library</td>
                            <td><span class="status-tag status-borrowed">Borrowed</span></td>
                            <td>2025-10-22 14:48:36</td>
                        </tr>
                        <tr>
                            <td>Mystery of the Old Mansion</td>
                            <td>Purchase</td>
                            <td>Central City Library</td>
                            <td><span class="status-tag status-purchased">Purchased</span></td>
                            <td>2025-10-22 14:48:28</td>
                        </tr>
                        <tr>
                            <td>A History of Time</td>
                            <td>Borrow</td>
                            <td>KnowledgeGrid Mumbai</td>
                            <td><span class="status-tag status-requested">Requested</span></td>
                            <td>2025-10-21 11:30:05</td>
                        </tr>
                            <tr>
                            <td>Cooking for Beginners</td>
                            <td>Borrow</td>
                            <td>Central City Library</td>
                            <td><span class="status-tag status-requested">Requested</span></td>
                            <td>2025-10-20 09:15:45</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php include_once '../includes/footer.php'; ?>