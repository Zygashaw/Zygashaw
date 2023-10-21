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

    <div class="container sol">
      <h4>View JobSeeker Documents</h4>
      <table class="table table-stried table-border table-hover">
      	<thead>
      		<tr>
      			<th>Jobseeker Fullname</th>
      			<th>Sex</th>
      			<th>Phone</th>
      			<th>Jobseeker CV</th>
      			<th>Work Experiance</th>
      			<th>Educational Background</th>
      			<th>Job Title</th>
      			<th>Level</th>
      			<th>Organization Name</th>
      			<th>Registration Date</th>
      			<th>Actions</th>
      		</tr>
      	</thead>
      	<tbody>

      		<?php
				if($con)
				{

					$sql="select * from applicantdoc where status='pending...' order by `registration_date` DESC";
				    $userexist=mysqli_query($con,$sql);
				    $c=mysqli_num_rows($userexist);
				    if($c >= '1')
				    {
					while($row = mysqli_fetch_assoc($userexist)){
						$file=$row['cv'];
						$file1=$row['work_exprience'];
						$file2=$row['educational_background'];

				
			?>

				<tr>

					<td><?php echo $row['fullname']; ?></td>
					<td><?php echo $row['sex']; ?></td>
					<td><?php echo $row['phone']; ?></td>

					<td><?php echo $row['cv']; ?> 
					<a href="App/ " download="<?php echo $file; ?>">
					<span><div class="input-icon"><i class="fa fa-download"></i></div></span></a>
					</td>
					
					<td><?php echo $row['cv']; ?> 
					<a href="App/ " download="<?php echo $file1; ?>">
					<span><div class="input-icon"><i class="fa fa-download"></i></div></span></a>
					</td>
					<td><?php echo $row['cv']; ?> 
					<a href="App/ " download="<?php echo $file2; ?>">
					<span><div class="input-icon"><i class="fa fa-download"></i></div></span></a>
					</td>

					<td><?php echo $row['jobtitle']; ?></td>
					<td><?php echo $row['level']; ?></td>
					<td><?php echo $row['orgname']; ?></td>
					<td><?php echo $row['registration_date']; ?></td>
					<td>
					<a class="label btn btn-outline btn-success" href="viewjobseekerdoc.php? aid=<?php echo $row['aid'];?>" role="button">
	    				<span class="glyphicon" aria-hidden="true" name="approve">Approve</span>
	    			</a></td><td>
	    			<a class="label btn btn-outline btn-warning" href="rejectapp.php? docid=<?php echo $row['aid'];?>" role="button">
	    				<span class="glyphicon " aria-hidden="true">Reject</span>
	    			</a>
					</td>
				</tr>
			<?php
		      }
			}
		}
			?> 

			<!-- Approve -->
			<?php

            if (isset($_GET["aid"]))
              {
              $aid=$_GET["aid"];
              $_SESSION['aid']=$aid;

                $get_job = "select * from applicantdoc where aid='$aid' ";
                $run_job = mysqli_query($con, $get_job);
                while ($row_job=mysqli_fetch_array($run_job)) {

                $fullname=$row_job['fullname']; 
                  
                $sql1="update applicantdoc set status='Approved' where aid='$aid'";
			    $updated=mysqli_query($con,$sql1);

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