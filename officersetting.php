<!DOCTYPE html>

<?php
session_start();
include("includes/dbcon.php");

?>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>View Job Description</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/dataTables.min.css">
		
	</head>
	<body>
		  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	$eid=$_SESSION['eid'];
	$workplace=$_SESSION['workplace'];
	$name=$_SESSION['sun'];

?>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell " id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
	      <ul>

	      </li>
               <li class="link">
            <a href="viewjobdesc.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Job Description</span>
            </a>
          </li>

            <li class="link ">
            <a href="officerviewactivties.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Activies</span>
            </a>
          </li>
          
          <li class="link ">
            <a href="viewhiredemployee.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Hired Employee</span>
            </a>
          </li>
          
          <li class="link settings-btn">
            <a href="officersetting.php">
            <span class="glyphicon glyphicon-cog" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Settings</span>
            </a>
          </li>
        </ul>
		</div>

	 
			<!--Main content Area-->

		    <div class="col-md-10 col-sm-11 display-table-cell valign-top ">
		  <div class="row">
	  <header id="nav-header" class="clearfix">
	     <div class="col-md-5">
	     <nav class="navbar-default pull-left">
	       <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-manu">
	         <span class="sr-only"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	       </button>
	     </nav>
	      <input type="text" class="hidden-sm hidden-xs"id="header-search-field" placeholder="search for someting...">
	     </div>
	    <div class="col-md-7">
	      <ul class="pull-right" style=" margin-right:65px; ">
          <li id="wellcome" class="hidden-xs">welcome to your officer page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i><?php echo "$name"; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
          </li>
        </ul>
               
	    </div>
	  </header>
	</div>

		    <div class="container sol">
		      <h4>Change Password</h4>
		      	<form action="" method="POST">
		      		<div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
			        <input type="text" name="username" value="<?php echo"$name";?>" required readonly/>
			        <div class="input-icon"><i class="fa fa-key"></i></div>
			       </div>

		      		<div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
			        <input type="password" name="old" Placeholder="Enter Your Current Password" required autofocus/>
			        <div class="input-icon"><i class="fa fa-key"></i></div>
			      </div>
			      
			      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
			        <input type="password" name="new" Placeholder="Enter Your New Password" required/>
			        <div class="input-icon"><i class="fa fa-key"></i></div>
			      </div class="form-group">

			      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
			        <input type="password" name="new1" Placeholder="Confirm New Password" required/>
			        <div class="input-icon"><i class="fa fa-key"></i></div>
			      </div>

			      <div class="input-group " style="width:417px; margin-left:42px;">
		          <input type="submit" name="submit" class="btn btn-primary" value="Change"/>
		          <div class="input-icon"></div>
		        </div>
		      </form>

		      <?php
		    if(isset($_POST['submit']))
		    {
				$username = $_POST['username'];
		        $password = sha1($_POST['old']);
		        $newpassword = sha1($_POST['new']);
		        $confirmnewpassword = sha1($_POST['new1']);

                $result = mysqli_query($con,"SELECT * FROM account WHERE username='$username'");
		        $row=mysqli_fetch_assoc($result);
		        $pass=$row['password'];

		        if($pass==$password)
		        {
				    if($newpassword==$confirmnewpassword)
				    {
			          $sql=mysqli_query($con,"UPDATE account SET password='$newpassword' where username='$username'");
				         if($sql)
					        {
					        echo "<center><font color='green'>Password Successfully Changed!! </font></center>";
					        }
			        }
			       else
			        {
			       echo "<center><font color='red'>Password does not match</font></center>";
	               }	
		       }
				else
				print "<center><font color='red'>Incorrect Password</font></center>";

         }
      ?>
		       
		  </div>
			    <div class="row">
			  <footer id="admin-footer" class="clearfix">
			    <div class="pull-left"><b>Copyright</b> &copy; 2018</div>
			    <div class="pull-right">admin system</div>
			  </footer>
			</div>
			

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/default.js"></script>
			<script src="js/dataTables.bootstrap.min.js"></script>
			<script src="js/jquery.dataTables.min.js"></script>
			<script>
			$('#mydata').dataTable();
			</script>
			 <?php
		}
		else
		{
		header("location:admin/index.php");
		}
		?> 
			</body>
			</html>