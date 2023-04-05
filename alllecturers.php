<?php
$conn = mysqli_connect('localhost','root','','user_db') or die('connection failed');
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <script type="text/javascript">
      window.history.forward();
    </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PSCMR</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="ahome.php">PSCMR </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $sql="select * from admin_table where id='$user_id'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();
                            $fname=$row['fname'];
                            $lname=$row['lname'];
                            $img=$row['image'];
                            ?>
                            <br><h3><?php echo $fname; echo$lname ?> </h3>
                        </ul>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="ahome.php"><i class="menu-icon icon-home"></i>Home</a></li>
                                 <li><a href="allstudents.php"><i class="menu-icon icon-inbox"></i>All Students</a></li>
                                <li><a href="alllecturers.php"><i class="menu-icon icon-book"></i>All Lecturers </a></li>
                                <li><a href="alladmins.php"><i class="menu-icon icon-tasks"></i>All Admins</a></li>
                                <li><a href="addstudent.php"><i class="menu-icon icon-list"></i>Add Student</a></li>
                                <li><a href="addlecturer.php"><i class="menu-icon icon-list"></i>Add Lecturer</a></li>
                                <li><a href="addadmin.php"><i class="menu-icon icon-list"></i>Add Admin</a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--.sidebar-->
                    </div>

                    <div class="span9">
                  <form class="form-horizontal row-fluid" action="alllecturers.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" name="title" placeholder="Enter Lecturer ID" class="span8" required>
                                                <button type="submit" name="submit"class="btn">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select * from lecturer_table where uname='$s' or uname like '%$s%'";
                                        }
                                    else
                                        $sql="select * from lecturer_table";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Lecturer ID</th>
                                      <th>Full Name</th>
                                      <th>Email</th>
                                      <th>Mobile No</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            
                            
                            while($row=$result->fetch_assoc())
                            {
                                $uname=$row['uname'];
                                $fname=$row['fname'];
                                $lname=$row['lname'];
                                $email=$row['pemail'];
                                $mno=$row['mno'];
                            ?>
                                    <tr>
                                      <td><?php echo $uname ?></td>
                                      <td><?php echo $fname;echo $lname ?></td>
                                      <td><b><?php echo $email ?></b></td>
                                      <td><b><?php echo $mno ?></b></td>
                                        <td><center>
                                            <a href="aldetailsview.php?id=<?php echo $uname; ?>" class="btn btn-primary">All Details</a><br><br>
                                            <a href="aldelete.php?id=<?php echo $uname; ?>" class="btn btn-danger">Delete</a>
                                        </center></td>
                                    </tr>
                               <?php }} ?>
                               </tbody>
                                </table>
                            </div>
                    
                </div>
            </div>
            
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 PSCMR </b>21KT5A4206
            </div>
        </div>
        
        
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>


