<?php
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'e_library');
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die('Database connection failed: ' . htmlspecialchars($conn->connect_error));
}
$conn->set_charset('utf8mb4');

// Common helpers
function is_admin_logged_in(): bool
{
    return isset($_SESSION['admin_id']);
}
function is_user_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}
function current_user_name(): string
{
    return $_SESSION['user_name'] ?? '';
}
function nearest_library_id(): ?int
{
    return isset($_SESSION['nearest_library_id']) ? (int) $_SESSION['nearest_library_id'] : null;
}

function get_nearest_library_by_city(mysqli $conn, string $city): ?array
{
    $city = trim($city);
    if ($city === '')
        return null;
    // Exact match 
    $stmt = $conn->prepare('SELECT id, name, city, state FROM libraries WHERE LOWER(city) = LOWER(?) LIMIT 1');
    $stmt->bind_param('s', $city);
    if ($stmt->execute()) {
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc())
            return $row;
    }
    // Fallback: fuzzy match by LIKE
    $like = '%' . $city . '%';
    $stmt = $conn->prepare('SELECT id, name, city, state FROM libraries WHERE city LIKE ? ORDER BY id ASC LIMIT 1');
    $stmt->bind_param('s', $like);
    if ($stmt->execute()) {
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc())
            return $row;
    }
    // Final fallback: first library
    $res = $conn->query('SELECT id, name, city, state FROM libraries ORDER BY id ASC LIMIT 1');
    return $res && $res->num_rows ? $res->fetch_assoc() : null;
}
