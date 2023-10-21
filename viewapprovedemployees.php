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
		<title>Job Tracking</title>

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
	  $eid=$_SESSION['eid'];
	  $workplace=$_SESSION['workplace'];
	  $name=$_SESSION['sun'];
	?>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
	      <ul>

	      </li>
               <li class="link">
            <a href="head.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>

            <?php
                $sql="select * from applicantresult where status3='Pending...'";
                $query = mysqli_query($con,$sql);
                $coun = mysqli_num_rows($query);
            ?>
            <span class="hidden-sm hidden-xs">Approve Hired Employee 
               <span class="label label-danger pull-right hidden-sm hidden-xs" ><?php echo $coun?></span>
            </span>
            </a>
          </li>


         <li class="link ">
            <a href="viewcomment.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Comments</span>
            </a>
         </li>
          
          <li class="link active">
            <a href="viewapprovedemployees.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Approved Employee</span>
            </a>
          </li>
          
          <li class="link settings-btn">
            <a href="headsetting.php">
            <span class="glyphicon glyphicon-cog" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Settings</span>
            </a>
          </li>
        </ul>
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
          <li id="wellcome" class="hidden-xs">welcome to your Head page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i> <?php echo "$name"; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="headsetting.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
	  <form action="viewapprovedemployees.php" method="post"  enctype="multipart/form-data">
	    <div class="row">
	      <h4>Approved Employees 

	      <span class="pull-right"><?php echo date("m/d/y");?></span></h4> 
	       <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                View Approved Employees

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
                                                <th>Interview Date</th>
                                                <th>Result </th>
                                                <th>Status </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
      		<?php
				if($con)
				{

					$sql="SELECT * FROM applicantresult ORDER By organaization_name";
				    $userexist=mysqli_query($con,$sql);
				    $c=mysqli_num_rows($userexist);
				    if($c >= '1')
				    {
					while($row = mysqli_fetch_assoc($userexist)){
					$interview=$row['interview'];
					$status2=$row['status2'];
					$status3=$row['status3'];
					if ($status3 ='Approved' && $status3 !='Pending...' && $status2 !=Null) {
			?>

				<tr>

					<td><?php echo $row['afullname']; ?></td>
					<td><?php echo $row['sex']; ?></td>
					<td><?php echo $row['organaization_name']; ?></td>
					<td><?php echo $row['vacancy_title']; ?></td>
					<td><?php echo $row['test']; ?></td>
					<td><?php echo $row['interview']; ?></td>
					<td><?php echo $row['total_grade']; ?></td>					
					<td><?php echo $row['interviewdate']; ?></td>
					<td><?php echo $row['status2']; ?></td>
					<td><font color='Green'><?php echo $row['status3']; ?></font></td>


					<td>
					<a class="label btn btn-xs label-message" href="viewapprovedemployees.php? doid=<?php echo $row['aid'];?>" role="button">
	    				<span class="glyphicon " aria-hidden="true">Cancel</span>
	    			</a>
					</td>

                    <?php
                    if (isset($_GET["doid"]))
                      {
                      $aid=$_GET["doid"];
                      $_SESSION['jid']=$aid;

                        $get_job = "SELECT * FROM applicantresult WHERE aid='$aid' ";
                        $run_job = mysqli_query($con, $get_job);
                        while ($row_job=mysqli_fetch_array($run_job)) {
                        $fullname=$row_job['afullname']; 

                        $sql1=mysqli_query($con,"UPDATE applicantresult SET status3='Pending...' WHERE aid='$aid'");
                                 
                        }
                    }
                    
                      ?>
				</tr>
				<?php }}}}?>
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
<script src="js/bootstrap.min.js"></script>
<script src="js/default.js"></script>


<!-- DataTables JavaScript -->
        // <script src="js/jquery.dataTables.min.js"></script>
        // <script src="js/dataTables.bootstrap.min.js"></script>
        // <script src="js/dataTables.bootstrap.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
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