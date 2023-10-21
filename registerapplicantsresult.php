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
?>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell " id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
				<?php include("sidemenu.php") ?>
	      
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
	      <ul class="pull-right">
	        <li id="wellcome" class="hidden-xs">welcome to your Employer page</li>
	        

	        <li>
	        <a href="logout.php" class="logout">
	        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
	        Logout
	        </a>
	        </li>
	      </ul>
	    </div>
	  </header>
	</div>

    <div class="container sol">
      <h4>View JobSeeker Documents</h4>
      <table class="table table-stried table-border table-hover">
      	<thead>
      		<tr>
      			<th>Jobseeker Fullname</th>
      			<th>Job Title</th>
      			<th>Level</th>
      			<th>Organization Name</th>
      			<th>Sex</th>
      			<th>Gpa</th>
      			<th>Work Experiance</th>
      			<th>Health Status</th>
      			<th>Registration Date</th>
      			<th>Actions</th>
      		</tr>
      	</thead>
      	<tbody>

      		<?php
				if($con)
				{

					$sql="select * from applicantdoc where status='Approved' and status1='-' order by `registration_date` DESC";
				    $userexist=mysqli_query($con,$sql);
				    $c=mysqli_num_rows($userexist);
				    if($c >= '1')
				    {
					while($row = mysqli_fetch_assoc($userexist)){
				
			?>

				<tr>

					<td><?php echo $row['fullname']; ?></td>
					<td><?php echo $row['jobtitle']; ?></td>
					<td><?php echo $row['level']; ?></td>
					<td><?php echo $row['orgname']; ?></td>
					<td><?php echo $row['sex']; ?></td>
					<td><?php echo $row['gpa']; ?></td>
					<td><?php echo $row['workexp']; ?></td>
					<td><?php echo $row['health']; ?></td>
					
					<td><?php echo $row['registration_date']; ?></td>
					<td>
					<a class="label btn btn-xs label-message" href="registertestresult.php? docid=<?php echo $row['aid'];?>" role="button">
	    				<span class="glyphicon " aria-hidden="true">Fill Result</span>
	    			</a></td><td>
	    			<a class="label btn btn-xs label-message" href="fillpractical.php? docid=<?php echo $row['aid'];?>" role="button">
	    				<span class="glyphicon " aria-hidden="true">Fill Practical</span>
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