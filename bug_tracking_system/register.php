<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <form class="container" method="post">
         <h2>Register</h2>
        <label for="email"><b>Email</b>:</label><br>
        <input type="text" id="email" name="email" required><br>
        <label for="username"><b>Username</b>:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password"><b>Password</b>:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" value="Register"><b>Sign In</b></button><br> <br>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>

</body>
</html>
