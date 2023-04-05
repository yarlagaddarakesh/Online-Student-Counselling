<?php
session_start();

if(isset($_POST['submit'])){
  $uname = $_POST['uname'];
  $pwd =  $_POST['pwd'];
  $conn = mysqli_connect('localhost','root','','user_db') or die('connection failed');
  if(isset($_POST['usertype'])){
    $usertype = $_POST['usertype'];

    # Student Login

    if($usertype == "Student"){
      $select = mysqli_query($conn, "SELECT * FROM `student_table` WHERE uname = '$uname' AND pwd = '$pwd'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['uname'] = $_POST['uname'];
        header('location:shome.php');
      }
      else{
      $message[] = 'incorrect email or password!';
      }
    }

    # Lecturer Login 

    elseif($usertype == "Lecturer"){
      $select = mysqli_query($conn, "SELECT * FROM `lecturer_table` WHERE uname = '$uname' AND pwd = '$pwd'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['counid'] = $_POST['uname'];
        header('location:lhome.php');
      }
      else{
      $message[] = 'incorrect email or password!';
      }
    }

  
    # Admin Login

    elseif($usertype == "Admin"){
      $select = mysqli_query($conn, "SELECT * FROM `admin_table` WHERE uname = '$uname' AND pwd = '$pwd'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:ahome.php');
      }
      else{
      $message[] = 'incorrect email or password!';
      }
    }

  }

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script type="text/javascript">
      window.history.forward();
    </script>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="a2.login.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <form method="post">
          <div class="user_type">
              User Type : &nbsp;
              <input type="radio" name="usertype" value="Student" required="required"> Student &nbsp; 
              <input type="radio" name="usertype" value="Lecturer" required="required"> Lecturer &nbsp; 
              <input type="radio" name="usertype" value="Admin" required="required"> Admin
            </div> 
        <div class="txt_field">
          <input type="text" name="uname" required>
          <span></span>
          <label>Username</label>
        </div> 
        <div class="txt_field">
          <input type="password" name="pwd" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" name="submit" value="Login">
        </div>
        
      </form>
      
    </div>
    

  </body>
</html>