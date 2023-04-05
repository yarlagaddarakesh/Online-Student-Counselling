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
                        <div class="module">
                            <div class="module-head">
                                <h3>Update Details</h3>
                            </div>
                            <div class="module-body">


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
                                $pwd=$row['pwd'];
                                $img=$row['image'];
                                ?>    
                    			
                                <form class="form-horizontal row-fluid" action="leprofile.php?id=<?php echo $user_id ?>" method="post" enctype="multipart/form-data">
                                <div class="control-group">
                                            <div class="controls"> 
                                            <img class="card-img-top" src="lecturer_img/<?php echo $img ?>" alt="Card image cap" style="height: 170px;width:150px;border-radius:50%;">
                                            </div>
                                        </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Lecturer ID</b></label>
                                        <div class="controls">
                                            <input type="text" name="Name" value= "<?php echo $uname?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Full Name:</b></label>
                                        <div class="controls">
                                            <input type="text" name="Name" value= "<?php echo $fname; echo $lname;?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Mobile No:</b></label>
                                        <div class="controls">
                                            <input type="text" name="mno" value= "<?php echo $mno?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Personal Email:</b></label>
                                        <div class="controls">
                                            <input type="email" name="pemail" value= "<?php echo $pemail?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Collage Email:</b></label>
                                        <div class="controls">
                                            <input type="email" name="cemail" value= "<?php echo $cemail?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Designation:</b></label>
                                        <div class="controls">
                                            <input type="text" name="design" value= "<?php echo $design?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Qualification:</b></label>
                                        <div class="controls">
                                            <input type="text" name="qual" value= "<?php echo $qual?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Experience:</b></label>
                                        <div class="controls">
                                            <input type="text" name="exp" value= "<?php echo $exp?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Specialization:</b></label>
                                        <div class="controls">
                                            <input type="text" name="spec" value= "<?php echo $spec?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>New Password:</b></label>
                                        <div class="controls">
                                            <input type="password" name="pwd"  value= "<?php echo $pwd?>" class="span8" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Update Photo</b></label>
                                        <div class="controls">
                                            <input type="file" name="update_image" value= ""  class="span8" >
                                        </div>
                                    </div>  
                                    <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn-primary"><center>Update Details</center></button>
                                            </div>
                                        </div>    
                                        
                                        

                                </form>
                    		           
                        </div>
                        </div> 	
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 PSCMR </b>21KT5A4206
            </div>
        </div>
        
        <!--/.wrapper-->
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
    $uname = $_GET['id'];
    $mno=$_POST['mno'];
    $pemail=$_POST['pemail'];
    $cemail=$_POST['cemail'];
    $qual=$_POST['qual'];
    $exp=$_POST['exp'];
    $design=$_POST['design'];
    $spec=$_POST['spec'];
    $pwd=$_POST['pwd'];                             
    $sql1="update lecturer_table set mno='$mno', pemail='$pemail', cemail='$cemail', qual='$qual', exp='$exp', design='$design', spec='$spec', pwd='$pwd' where uname='$uname'";
    if($conn->query($sql1) === TRUE){
        $update_image = $_FILES['update_image']['name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder = 'lecturer_img/'.$update_image;
        if(!empty($update_image)){
           if($update_image_size > 2000000){
             echo "<script type='text/javascript'>alert('Image Size is too Large')</script>";
           }else{
              $image_update_query = "update lecturer_table set image='$update_image' where uname='$uname'";
              if($conn->query($image_update_query) === TRUE){
                 move_uploaded_file($update_image_tmp_name, $update_image_folder);
              }
              echo "<script type='text/javascript'>alert('Image Updated Susessfully')</script>";
           }
        }
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