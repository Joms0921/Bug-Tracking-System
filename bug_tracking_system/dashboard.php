<?php
include 'db.php';
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM bugs WHERE user_id=".$_SESSION['userid'];
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    

<style>
        
        .navbar {
          width: 100%;
          background-color:rgb(3, 43, 103);;
          overflow: auto;
        }
      
        .navbar h2{
          float: left;
          font-size: 20px;
          color: white;
          font-family: serif;
        }
        
        .navbar a {
          float: right;
          text-align: center;
          padding: 12px;
          color: white;
          text-decoration: none;
          font-size: 17px;
        }
      
        .navbar a:hover {
          background-color: #000;
        }
        
      
        .active {
          background-color: #04AA6D;
        }
        
        
        @media screen and (max-width: 500px) {
          .navbar a {
            float: none;
            display: block;
          }
        }
      </style>
      
</head>
<body>
    <div class="navbar">
        <h2> &nbsp; &nbsp; Welcome To Bug Tracking System, <?php echo $_SESSION['email']; ?></h2> 
        <a href="logout.php"><i class="fa fa-fw fa-user"></i> logout</a>
    </div>
    <br><br>

    <h2>Bug List</h2>
    <a href="add_bug.php" class="add-bug">Add Bug</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Severity</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['severity']."</td>";
                    echo "<td>".$row['priority']."</td>";
                    echo "<td>".$row['status']."</td>";
                    echo "<td><a href='update_bug.php?id=".$row['id']."'>Edit</a> | <a href='delete_bug.php?id=".$row['id']."'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No bugs found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
