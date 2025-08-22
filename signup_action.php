<?php
session_start();
require_once __DIR__ . '/../config/db.php';

function redirect_with($location, $type, $msg) {
    $_SESSION['flash'][$type][] = $msg;
    header("Location: " . $location);
    exit;
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Basic validation
if ($username === '' || $email === '' || $password === '' || $confirm === '') {
    redirect_with('../public/signup.php', 'danger', 'All fields are required.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirect_with('../public/signup.php', 'danger', 'Invalid email format.');
}
if ($password !== $confirm) {
    redirect_with('../public/signup.php', 'danger', 'Passwords do not match.');
}
if (strlen($password) < 6) {
    redirect_with('../public/signup.php', 'danger', 'Password must be at least 6 characters.');
}

// Check if username or email exists
$sql = "SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->close();
    redirect_with('../public/signup.php', 'warning', 'Username or Email already exists.');
}
$stmt->close();

// Insert new user with hashed password
$hash = password_hash($password, PASSWORD_DEFAULT);
$insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$insert->bind_param("sss", $username, $email, $hash);
if ($insert->execute()) {
    $insert->close();
    redirect_with('../public/index.php', 'success', 'Signup successful! Please log in.');
} else {
    $insert->close();
    redirect_with('../public/signup.php', 'danger', 'Something went wrong. Please try again.');
}
