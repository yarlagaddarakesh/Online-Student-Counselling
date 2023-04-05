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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="ahome.php">PSCMR</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">
                            <?php
                            $rollno = $_SESSION['user_id'];
                            $sql="select * from admin_table where id='$user_id'";
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
                        
                    </div>
                    
                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Add Lecturer</h3>
                            </div>
                            <div class="module-body">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="addlecturer.php" method="post" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label" ><b>Councellor ID</b></label>
                                            <div class="controls">
                                                <input type="text" name="uname" placeholder="Councellor ID" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Password</b></label>
                                            <div class="controls">
                                                <input type="password" name="pwd" placeholder="Password" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>First Name</b></label>
                                            <div class="controls">
                                                <input type="text" name="fname" placeholder="First Name" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Last Name</b></label>
                                            <div class="controls">
                                                <input type="text" name="lname" placeholder="Last Name" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Mobile No</b></label>
                                            <div class="controls">
                                                <input type="text" name="mno" placeholder="Mobile No" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Personal Email</b></label>
                                            <div class="controls">
                                                <input type="email" name="pemail" placeholder="Personal Email" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Collage Email</b></label>
                                            <div class="controls">
                                                <input type="email" name="cemail" placeholder="Collage Email" class="span8" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" ><b>Qualification</b></label>
                                            <div class="controls">
                                                <input type="text" name="qual" placeholder="Qualification" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Experience</b></label>
                                            <div class="controls">
                                                <input type="text" name="exp" placeholder="Experience" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Designation</b></label>
                                            <div class="controls">
                                                <input type="text" name="design" placeholder="Designation" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" ><b>Specialization</b></label>
                                            <div class="controls">
                                                <input type="text" name="spec" placeholder="Specialization" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="file" name="choosefile" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Add Lecturer</button>
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
    $uname=$_POST['uname'];
    $pwd=$_POST['pwd'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mno=$_POST['mno'];
    $pemail=$_POST['pemail'];
    $cemail=$_POST['cemail'];
    $qual=$_POST['qual'];
    $exp=$_POST['exp'];
    $design=$_POST['design'];
    $spec=$_POST['spec'];
    $filename = $_FILES["choosefile"]["name"];
    $tempname = $_FILES["choosefile"]["tmp_name"];  
    $folder = "lecturer_img/".$filename;
$sql1="insert into lecturer_table (uname,pwd,fname,lname,mno,pemail,cemail,qual,exp,design,spec,image) values ('$uname','$pwd','$fname','$lname','$mno','$pemail','$cemail','$qual','$exp','$design','$spec','$filename')";

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