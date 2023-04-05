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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">PSCMR </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <?php
                            $rollno = $_SESSION['user_id'];
                            $sql="select * from student_table where id='$user_id'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();
                            $rollno=$row['uname'];
                            $fname=$row['fname'];
                            $lname=$row['lname'];
                            $counid=$row['counid']
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
                                <li class="active"><a href="shome.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="sprofile.php"><i class="menu-icon icon-inbox"></i>MY PROFILE</a>
                                </li>
                                <li><a href="sweeklyreport.php"><i class="menu-icon icon-book"></i>WEEKLY REPORT </a></li>
                                <li><a href="sresults.php"><i class="menu-icon icon-tasks"></i>RESULTS</a></li>
                                <li><a href="sattendance.php"><i class="menu-icon icon-list"></i>ATTENDANCE</a></li>
                                <li><a href="scertifications.php"><i class="menu-icon icon-list"></i>CERTIFICATIONS</a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Weekly Report</h3>
                            </div>
                            <div class="module-body">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="sweeklyreport.php" method="post" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="hidden" name="counid" value= "<?php echo $counid;?>" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Roll No</b></label>
                                            <div class="controls">
                                                <input type="text" name="rollno" value= "<?php echo $rollno;?>" class="span8" readonly>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Activity Name</b></label>
                                            <div class="controls">
                                                <input type="text" name="actname"  class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Organization Name</b></label>
                                            <div class="controls">
                                                <input type="text" name="orgname" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Date</b></label>
                                            <div class="controls">
                                                <input type="date" name="dates" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Description</b></label>
                                            <div class="controls">
                                                <input type="text" name="descp" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="file" name="choosefile" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Submit Report</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div>
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

<?php
if(isset($_POST['submit']))
{
    $counid=$_POST['counid'];
    $rollno=$_POST['rollno'];
    $actname=$_POST['actname'];
    $orgname=$_POST['orgname'];
    $dates=$_POST['dates'];
    $descp=$_POST['descp'];
    $filename = $_FILES["choosefile"]["name"];
    $tempname = $_FILES["choosefile"]["tmp_name"];  
    $folder = "weeklyreport_img/".$filename;
$sql1="insert into weekly_report (counid,rollno,actname,orgname,dates,descp,img) values ('$counid','$rollno','$actname','$orgname','$dates','$descp','$filename')";

if($conn->query($sql1) === TRUE){
    move_uploaded_file($tempname, $folder);
echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?>
      
    </body>

</html>