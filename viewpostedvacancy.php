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
		<title> View Requested Appliccant</title>

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
     $photo=$_SESSION['sphoto'];
	$workplace=$_SESSION['workplace'];
?>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
				<!-- <center>
			    <?php echo "<img src='".$photo."' align:center; width:50; height:50; >"?>
			    </center> -->
	      <?php include("sidemenu.php") ?>
			</div>

	 
			<!--Main content Area-->

		    <div class="col-md-10 col-sm-11 display-table-cell valign-top box">
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
			      <ul class="pull-right" style=" margin-right:45px; ">
          <li id="wellcome" class="hidden-xs">welcome to your Employer page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i> <?php echo "$name"; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="employersetting.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
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

       <div class="container">
	  <form action="viewrequestedapplicant.php" method="post" enctype="multipart/form-data">
	    <div class="row">
	      <h4 >View Posted Jobs </h4>
	       
	       <table class="table table-stried table-border table-hover" >
      	<thead>
      		<tr>
      			<th>Post ID</th>
      			<th>Job ID</th>
      			<th>Job Title</th>
      			<th>Job Level</th>
      			<th>Organization Name</th>
      			<th>Job Posted Date</th>
      			<th>Registration Date</th>
      			<th>Dadeline</th>
      			<th>Actions</th>
      		</tr>
      	</thead>
      	
      	<tbody>

      		<?php
      		$currentdate=date('Y-m-d');
				if($con)
				{

					$sql="SELECT * FROM postvacany WHERE status='Posted' ORDER BY posted_date DESC";
				    $userexist=mysqli_query($con,$sql);
				    $c=mysqli_num_rows($userexist);
				    if($c >= '1')
				    {
					while($row = mysqli_fetch_assoc($userexist)){
						$dead=$row['dead_line'];
                        if ($dead<=$currentdate){
			?>
				<tr>
					<td><?php echo $row['vid']; ?></td>
					<td><?php echo $row['jobid']; ?></td>
					<td><?php echo $row['jobtitle']; ?></td>
					<td><?php echo $row['leveltype']; ?></td>
					<td><?php echo $row['organaization_name']; ?></td>
					<td><?php echo $row['posted_date']; ?></td>
					<td><?php echo $row['registration_date']; ?></td>
					<td><?php echo $row['dead_line']; ?></td>
					<td>
					
	    			<a class="label btn btn-outline btn-success" href="registerapplicant.php? vid=<?php echo $row['vid'];?>" role="button">Edit</a>
	    			<a class="label btn btn-outline btn-success" href="registerapplicant.php? vid=<?php echo $row['vid'];?>" role="button">Register</a>
	    			<a class="label btn btn-outline btn-warning" href="viewpostedvacancy.php? NotFound=<?php echo $row['jobid'];?>" role="button">Not Found</a>
	    			</td>
					
				</tr>
			<?php
		      }
				}
			}
				else 
					echo "<font color=red>No results!!</font>";
			}
			?>

			<!-- No Results Found -->
			<?php

            if (isset($_GET["NotFound"]))
              {
              $docid=$_GET["NotFound"];
              $_SESSION['aid']=$docid;

                $get_job1 = "SELECT * FROM postvacany WHERE jobid='$docid' ";
                $run_job1= mysqli_query($con, $get_job1);                

	                while ($row_job=mysqli_fetch_array($run_job1)) {

	                $requestedno=$row_job['requestedno'];
                	

			        	$get_job = "SELECT * FROM job_desc WHERE job_id='$docid' ";
			            $run_job = mysqli_query($con, $get_job);
 				
			 				while ($row_job1=mysqli_fetch_array($run_job)) {
				 				$permissible=$row_job1['permissible'];

				 		        $Noresult=$requestedno + $permissible;

				 		       }

			                $sql1="UPDATE request SET status='No Applicants Found' where job_id='$docid'";
						    $updated=mysqli_query($con,$sql1);


						    $sql1="UPDATE job_desc SET permissible='$Noresult' where job_id='$docid'";
						    $updated=mysqli_query($con,$sql1);

						    $sql1="UPDATE postvacany SET status='No Applicants Found' where jobid='$docid'";
						    $updated=mysqli_query($con,$sql1);

                 }
 
                }
              ?>
	      	</tbody>
      </table>
      
	    </div>
	    
	  </form>
	  </div>
  
  

<div class="row">
  <footer id="admin-footer" class="clearfix">
    <div class="pull-left"><b>Copyright</b> &copy; 2018</div>
    <div class="pull-right">admin system</div>
  </footer>
</div>
</div>
</div>
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
