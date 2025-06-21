<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = pg_escape_string($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT password FROM users WHERE username = '$username'";
    $result = pg_query($conn, $query);

    if ($row = pg_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            echo "<script>alert('Login successful!'); window.location.href = 'dashboard.php';</script>";
        } else {
            echo "<script>alert('Invalid password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User not found.'); window.history.back();</script>";
    }
}
?>
