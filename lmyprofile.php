<?php
$conn = mysqli_connect('localhost','root','','user_db') or die('connection failed');
session_start();
$user_id = $_SESSION['counid'];
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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="lhome.php">PSCMR </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <?php
                            
                            $sql="select * from lecturer_table where uname='$user_id'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();
                            $fname=$row['fname'];
                            $lname=$row['lname'];
                            $img=$row['image'];
                            ?>
                            <br><h3><?php echo $fname;echo$lname ?> </h3>
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
                                <li class="active"><a href="lhome.php"><i class="menu-icon icon-home"></i>Home</a></li>
                                 <li><a href="lmyprofile.php"><i class="menu-icon icon-inbox"></i>MY PROFILE</a></li>
                                <li><a href="lweeklyreports.php"><i class="menu-icon icon-book"></i>WEEKLY REPORTS</a></li>
                                <li><a href="lstudentdetails.php"><i class="menu-icon icon-tasks"></i>STUDENT DETAILS</a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                    	<center>
                           	<div class="card" style="width: 70%;"> 
                    			<div class="card-body">
                            <?php
                            $sql="select * from lecturer_table where uname='$user_id'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();
                                $fname=$row['fname'];
                                $lname=$row['lname'];
                                $uname=$row['uname'];
                                $mno=$row['mno'];
                                $pemail=$row['pemail'];
                                $cemail=$row['cemail'];
                                $qual=$row['qual'];
                                $exp=$row['exp'];
                                $design=$row['design'];
                                $spec=$row['spec'];
                                $img=$row['image'];

                            ?>

                                <center><img class="card-img-top" src="lecturer_img/<?php echo $img ?>" alt="Card image cap" style="height: 170px;width:150px;border-radius:50%;"></center><br>
                                <table class="table" id = "tables" style="color:blue;font-weight: bold;font-family:monospace;font-size:15px;text-transform:uppercase;">
                                  <thead>
                                    <tr>
                                      <th>LECTURER ID</th>
                                      <td><?php echo $uname ?></td>
                                    </tr>
                                    <tr>
                                      <th>FULL NAME</th>
                                      <td><?php echo $fname;echo $lname ?></td>
                                    </tr>
                                    <tr>
                                      <th>MOBILE NUMBER</th>
                                      <td><?php echo $mno ?></td>
                                    </tr>
                                    <tr>
                                      <th>PERSONAL EMAIL</th>
                                      <td><?php echo $pemail ?></td>
                                    </tr>
                                    <tr>
                                      <th>COLLAGE EMAIL</th>
                                      <td><?php echo $cemail ?></td>
                                    </tr>
                                    <tr>
                                      <th>QUALIFICATION</th>
                                      <td><?php echo $qual ?></td>
                                    </tr>
                                    <tr>
                                      <th>EXPERIENCE</th>
                                      <td><?php echo $exp ?></td>
                                    </tr>
                                    <tr>
                                      <th>DESIGNATION</th>
                                      <td><?php echo $design ?></td>
                                    </tr>
                                    <tr>
                                      <th>SPECIALIZATION</th>
                                      <td><?php echo $spec ?></td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                               
                    			</div>
                    		</div>
                            <br>
                            <a href="leprofile.php" class="btn btn-primary">Edit Details</a>    
      					</center>              	
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright"align="center">&copy; 2022 PSCMR </b> 21KT5A4206
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