<?php
session_start();

// Set your admin credentials here
$admin_username = "admin";
$admin_password = "12345"; // change this before demo if you like

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit;
    } else {
        echo "<script>
                alert('❌ Invalid username or password!');
                window.location.href='login.php';
              </script>";
    }
} else {
    header("Location: login.php");
    exit;
}
?>
