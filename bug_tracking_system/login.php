<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['userid'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("Location: dashboard.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  
    <form class="container" method="post">
        <h2>Login</h2>
        <label for="email"><b>Email</b>:</label><br>
        <input type="text" id="email" name="email" required><br>
        <label for="password"><b>Password</b>:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" value="Login"><b>LOGIN</b></button> <br>
        <p>Don't have an account? <a href="register.php">Sign in here</a></p> 

    </form>
</body>
</html>