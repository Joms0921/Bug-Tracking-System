<?php
include 'db.php';
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "DELETE FROM bugs WHERE id='$id' AND user_id=".$_SESSION['userid'];

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
