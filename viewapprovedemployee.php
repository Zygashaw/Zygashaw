<!DOCTYPE html>
<?php
session_start();
include("includes/dbcon.php");

?>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>View Approved Employee</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" href="css/style.css">
		<!-- DataTables CSS -->
        <link href="css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="css/dataTables.responsive.css" rel="stylesheet">

	</head>
	<body>

	<?php

	if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
	{
	  $eid=$_SESSION['eid']
	?>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
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
	      
          <span type="submit" name="submit" class="btn btn-primary">Search</span>
          
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
	  <form action="viewapprovedemployee.php" method="post"  enctype="multipart/form-data">
	    <div class="row">

	      <h4>Approved Employees 
	      <span class="pull-right">
	      <?php echo date("m/d/y");?></span></h4> 
	       <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Assign Approved Employees
                                <span class="pull-right">
                                <input type="submit" name="Assign" value="Assign All" class="btn btn-primary" style=" margin-top:-7px; ">
	      						
	      						</span>

	      						<?php
					          if(isset($_POST["Assign"]))
					          {
					          	// $eid=$_SESSION['eid'];
					          	

					        $sql="SELECT * FROM applicantresult  ";
				            $userexist=mysqli_query($con,$sql);
				            
				            // $aid=$row['aid'];
				            if($userexist){

				            while($row = mysqli_fetch_assoc($userexist)){

				            	$sql1="UPDATE applicantresult SET status4='Assigned' WHERE status3='Approved' AND status2='Selected'";
							    $updated=mysqli_query($con,$sql1);
				            }
				        }
				        else
				        	echo "No Record";
					          }
					          ?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Sex</th>
                                                <th>Organization Name</th>
                                                <th>Job Title</th>
                                                <th>Test </th>
                                                <th>Interview</th>
                                                <th>Total</th>
                                                <!-- <th>Interview Date</th> -->
                                                <th>Result </th>
                                                <th>Status </th>
                                                <th>Assigned </th>
                                                <th>Assigned To</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>  
      		<?php
				if($con)
				{

					$sql="SELECT * FROM applicantresult WHERE status3='Approved' ORDER By organaization_name ";
				    $userexist=mysqli_query($con,$sql);
				    $c=mysqli_num_rows($userexist);
				    if($c >= '1')
				    {
					while($row = mysqli_fetch_assoc($userexist)){
					$interview=$row['interview'];
					$test=$row['test'];
					$app=$row['status3'];
					if ($interview>0 && $test>0) {
			?>

				<tr>

					<td><?php echo $row['afullname']; ?></td>
					<td><?php echo $row['sex']; ?></td>
					<td><?php echo $row['organaization_name']; ?></td>
					<td><?php echo $row['vacancy_title']; ?></td>	
					<td><?php echo $row['test']; ?></td>
					<td><?php echo $row['interview']; ?></td>
					<td><?php echo $row['total_grade']; ?></td>					
					<!-- <td><?php echo $row['interviewdate']; ?></td> -->
					<td><?php echo $row['status2']; ?></td>
					<td><?php echo $row['status3']; ?></td>
					<td><?php echo $row['Assign']; ?></td>
					<td><?php echo $row['status4']; ?></td>

					<td>
						<a class="label btn btn-xs label-message" href="viewapprovedemployee.php? assid=<?php echo $row['aid'];?>" role="button">
		    				<span class="glyphicon " aria-hidden="true">Assign</span>
		    			</a>
					</td>
					<td>
						<a class="label btn btn-xs label-message" href="viewapprovedemployee.php? cancelid=<?php echo $row['aid'];?>" role="button">
		    				<span class="glyphicon " aria-hidden="true">Cancel</span>
		    			</a>
					</td>
					<td>
						<a class="label btn btn-xs label-message" href="empreport.php? repid=<?php echo $row['aid'];?>" role="button">
		    				<span class="glyphicon " aria-hidden="true">Report</span>
		    			</a>
					</td>

					<!-- Assign -->
				<?php

                if (isset($_GET["assid"]))
                  {
                  $assid=$_GET["assid"];

                    $get_job = "SELECT * FROM applicantdoc WHERE aid='$assid' ";
                    $run_job = mysqli_query($con, $get_job);
                    while ($row_job=mysqli_fetch_array($run_job))
                     {
                    $date= date('Y-m-y');
                    $orgname=$row_job["orgname"];
                    //echo $orgname;
                }

                    $sql1="UPDATE applicantresult SET status4='$orgname' , Assign='Assigned' , assigneddate='$date' WHERE aid='$assid'";
                    $updated1=mysqli_query($con,$sql1);
                    if ($updated1) 
                    {
                    	//echo "successed";
                    
                      
                      }
                     }
                
                  ?>

				</tr>
				<?php }}}}?>

				<!-- Cancel -->
				<?php

                if (isset($_GET["cancelid"]))
                  {
                  $cancelid=$_GET["cancelid"];

                    $get_job = "SELECT * FROM applicantdoc WHERE aid='$cancelid' ";
                    $run_job = mysqli_query($con, $get_job);
                    while ($row_job=mysqli_fetch_array($run_job))
                     {
                    $date= date('Y-m-y');
                    $orgname=$row_job["orgname"];
                    //echo $orgname;
                }

                    $sql1="UPDATE applicantresult SET status4='' , Assign='Canceled' , assigneddate='$date' WHERE aid='$cancelid'";
                    $updated1=mysqli_query($con,$sql1);
                    if ($updated1) 
                    {
                    	//echo " Cancelled";
                    
                      
                      }
                     }else
                     //echo "no";
                
                  ?>

				</tr>
				
	      	</tbody>
     	 </table>
         </div>
         <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
	     
	      
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/default.js"></script>


<!-- DataTables JavaScript -->
         <script src="js/jquery.dataTables.min.js"></script>
         <script src="js/dataTables.bootstrap.min.js"></script>
         <script src="js/dataTables.bootstrap.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        // <script>
        //     $(document).ready(function() {
        //         $('#dataTables-example').DataTable({
        //                 responsive: true
        //         });
        //     });
        // </script>

<?php
}
else
{
header("location:admin/index.php");
}
?>
</body>
</html>