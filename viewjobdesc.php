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
	$workplace=$_SESSION['workplace'];
	$eid=$_SESSION['eid'];
    $name=$_SESSION['sun'];

?>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell " id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
	      <ul>

	      </li>
               <li class="link active">
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
          <li id="wellcome" class="hidden-xs">welcome to your Officer page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i><?php echo "$name";?> <b class="caret"></b>
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
      <h4>Job Description</h4>
      <table class="table table-stried table-border table-hover">
      	<thead>
      		<tr>
      			<th>Job Id</th>
      			<th>Job Title</th>
      			<th>Job Level</th>
      			<th>Permissible</th>
      			<th>Organization Name</th>
      			<th>Action</th>
      		</tr>
      	</thead>

      	<tbody>

      		<?php
				if($con)
				{

					$sql="SELECT * FROM job_desc WHERE orgname='$workplace' AND permissible >0";
				    $userexist=mysqli_query($con,$sql);
				    $c=mysqli_num_rows($userexist);
				    if($c >= '1')
				    {
					while($row = mysqli_fetch_assoc($userexist)){
				
			?>

				<tr>
					<td><?php echo $row['job_id']; ?></td>
					<td><?php echo $row['job_title']; ?></td>
					<td><?php echo $row['level_type']; ?></td>
					<td><?php echo $row['permissible']; ?></td>
					<td><?php echo $row['orgname']; ?></td>
					<td>
					<a class="label btn btn-xs label-message" href="requestapplicants.php? job_id=<?php echo $row['job_id'];?>" role="button">
	    				<span class="glyphicon " aria-hidden="true">&nbsp;Request</span>
	    			</a>
					</td>
				</tr>
			<?php
		      }
				}
			}
			?>
	      	</tbody>

      </table>


      
	      

       
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