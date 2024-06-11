<?php
include 'db.php';
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $severity = $_POST['severity'];
    $priority = $_POST['priority'];
    $user_id = $_SESSION['userid'];

    $sql = "INSERT INTO bugs (title, description, severity, priority, user_id) VALUES ('$title', '$description', '$severity', '$priority', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Bug</title>
    <link rel="stylesheet" href="bugStyle.css">

</head>
<body>
  
    <div class="form-container">
    <form method="post">
        <h2>Add Bug</h2>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="severity">Severity:</label><br>
        <input type="text" id="severity" name="severity" required><br>
        <label for="priority">Priority:</label><br>
        <input type="text" id="priority" name="priority" required><br><br>
        <input type="submit" value="Add Bug">
    </form>
    </div>
</body>
</html>
