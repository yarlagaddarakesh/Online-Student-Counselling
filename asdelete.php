<?php
$conn = mysqli_connect('localhost','root','','user_db') or die('connection failed');
session_start();
$user_id = $_SESSION['user_id'];
?>

<?php
$x=$_GET['id'];
$sql="delete from student_table where uname='$x'";
if($conn->query($sql) === TRUE){
    echo "<script type='text/javascript'>alert('Success')</script>";
    header("Location:allstudents.php",TRUE,303);
    }
    else
    {//echo $conn->error;
    echo "<script type='text/javascript'>alert('Error')</script>";
    }
?>