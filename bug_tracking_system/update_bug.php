<?php
include 'db.php';
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM bugs WHERE id='$id' AND user_id=".$_SESSION['userid'];
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Bug not found.";
    exit();
}

$bug = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $severity = $_POST['severity'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    $sql = "UPDATE bugs SET title='$title', description='$description', severity='$severity', priority='$priority', status='$status' WHERE id='$id'";

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
    <title>Update Bug</title>
    <link rel="stylesheet" href="bugStyle.css">

</head>
<body>
    
    <div class="form-container">
    <form method="post"> <br>
        <h2>Update Bug</h2>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $bug['title']; ?>" required><br>
        <label for="description"><b>Description</b>:</label><br>
        <textarea id="description" name="description" required><?php echo $bug['description']; ?></textarea><br>
        <label for="severity"><b>Severity</b>:</label><br>
        <input type="text" id="severity" name="severity" value="<?php echo $bug['severity']; ?>" required><br>
        <label for="priority"><b>Priority</b>:</label><br>
        <input type="text" id="priority" name="priority" value="<?php echo $bug['priority']; ?>" required><br>
        <label for="status"><b>Status</b>:</label><br>
        <input type="text" id="status" name="status" value="<?php echo $bug['status']; ?>" required><br><br>
        <input type="submit" value="Update Bug">
    </form>
    </div>
 
</body>
</html>
