<?php
include dirname(__DIR__,1) . '/includes/db_connect.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$_SESSION = [];
session_destroy();
header('Location: /knowledgegrid-libraries/index.php');
exit;