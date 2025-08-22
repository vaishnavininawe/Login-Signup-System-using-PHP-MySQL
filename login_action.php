<?php
session_start();
require_once __DIR__ . '/../config/db.php';

function redirect_with($location, $type, $msg) {
    $_SESSION['flash'][$type][] = $msg;
    header("Location: " . $location);
    exit;
}

$identity = trim($_POST['identity'] ?? '');
$password = $_POST['password'] ?? '';

if ($identity === '' || $password === '') {
    redirect_with('../public/index.php', 'danger', 'Please fill in all fields.');
}

// Fetch by email or username
$sql = "SELECT id, username, email, password FROM users WHERE email = ? OR username = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $identity, $identity);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    redirect_with('../public/index.php', 'danger', 'Incorrect username/email or password.');
}

if (!password_verify($password, $user['password'])) {
    redirect_with('../public/index.php', 'danger', 'Incorrect username/email or password.');
}

// Success: set session
$_SESSION['user'] = [
    'id' => $user['id'],
    'username' => $user['username'],
    'email' => $user['email']
];
$_SESSION['flash']['success'][] = "Logged in successfully.";
header("Location: ../public/dashboard.php");
exit;
