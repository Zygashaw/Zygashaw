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
	      <h4 >View Requested Applicants </h4>
	       
	       <table class="table table-stried table-border table-hover" >
      	<thead>
      		<tr>
      			<th>Job Id</th>
      			<th>Job Title</th>
      			<th>Job Level</th>
      			<th>Organization Name</th>
      			<th>Work Process</th>
      			<th>Work Description</th>
      			<th>Requested No</th>
      			<th>Work Starting Date</th>
      			<th>Requested By</th>
      			<th>Budget Availablity Checked By</th>
      			<th>Actions</th>
      		</tr>
      	</thead>
      	
      	<tbody>

      		
	      	
      <?php
				if($con)
				{

					$sql="select * from request where status='Pending...'";
				    $userexist=mysqli_query($con,$sql);
				    $c=mysqli_num_rows($userexist);
				    if($c >= '1')
				    {
					while($row = mysqli_fetch_assoc($userexist)){
				
			?>
				<tr>
					<td><?php echo $row['job_id']; ?></td>
					<td><?php echo $row['jobtitle']; ?></td>
					<td><?php echo $row['leveltype']; ?></td>
					<td><?php echo $row['organaization_name']; ?></td>
					<td><?php echo $row['work_process']; ?></td>
					<td><?php echo $row['description']; ?></td>
					<td><?php echo $row['requestedno']; ?></td>
					<td><?php echo $row['work_starting_date']; ?></td>
					<td><?php echo $row['requested_by']; ?></td>
					<td><?php echo $row['budget_availablity_checked_by']; ?></td>
					
	    			<td>
	    			<a class="label btn btn-outline btn-success" href="postvacancy.php? postid=<?php echo $row['rid'];?>" role="button">Post</a>
	    			<!-- <a class="btn btn-xs btn-danger" href="viewrequestedapplicant.php? po=<?php echo $row['rid'];?>" role="button">Not Found</a> -->
	    			</td>
					
				</tr>
			<?php
		      }
		  }else
					echo "<font color='red' align='center'>No Records Found!</font>";
		}
			?>

			<!-- No Results Found -->
			<?php

            if (isset($_GET["po"]))
              {
              $docid=$_GET["po"];
              $_SESSION['aid']=$docid;

                $get_job = "select * from request where rid='$docid' ";
                $run_job = mysqli_query($con, $get_job);
                while ($row_job=mysqli_fetch_array($run_job)) {
 
                $sql1="UPDATE request SET status='No Applicants Found' where rid='$docid'";
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
    <div class="pull-right">Employer system</div>
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
