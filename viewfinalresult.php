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
		<title>Register Appliccant</title>

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
	  <form action="viewfinalresult.php" method="post"  enctype="multipart/form-data">
	    <div class="row">
	      <h4>Applicant Final Result 

	      <span class="pull-right"><?php echo date("m/d/y");?></span></h4> 
	      
	       <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">


                 <p>Final Test Result</p>

                 

                 <li class="sidebar-search pull-left" style="list-style-type:none; margin-top:-40px; margin-left:185px;">
                              <select name="org">
                              <option>Select Organization</option>
					           <?php 

					            $get_org ="SELECT * FROM organization";
					            $run_org = mysqli_query($con, $get_org);
					            while ($row_org=mysqli_fetch_array($run_org)) {
					            	$org=$row_org['orgname'];

					            	echo "<option>$org</option>";
					            }

					            ?>
					            
						      </select>
					          <span class="input-group-btn"></span>

            </li>
                     
            <li class="sidebar-search pull-right" style="margin-top:-33px; list-style-type:none;">
                <div class="input-group custom-search-form">
                    <input type="text" name="search1" class="form-control solomon" placeholder="No Of Stand By" required/>
                    <span class="input-group-btn">
                        <!-- <button class="btn btn-primary" name="selected" type="button"> -->
                        <input type="submit" name="submit" class="btn btn-primary" value="Select" required/></span>
                </div>
            </li>

            <li class="sidebar-search pull-right" style="margin-top:-33px; list-style-type:none;">
                <div class="input-group custom-search-form">
                    <input type="text" name="search2" class="form-control" placeholder="No Of Selected" required/>
                    <span class="input-group-btn"></span>
                </div>
            </li>

            <li class="sidebar-search pull-right" style="margin-top:-33px; list-style-type:none;">
                <div class="input-group custom-search-form">
                    <input type="text" name="jobtitle" class="form-control solomon" required placeholder="Search Job Title"/>
                    <span class="input-group-btn">
                </div>
            </li>

            <!-- /input-group -->

			<?php
			if(isset($_POST["submit"]))
			{
			$countSelected = 0 ; 
			$count1=1;//selected
			$count2=1;//stand by
			$org=$_POST["org"];
			$jobtitle = $_POST["jobtitle"];
			$search2=$_POST["search2"];
			$search1=$_POST["search1"];
			$total_requested=$search2 + $search1;
			$stand=1;

			$select = "SELECT * FROM applicantresult  WHERE organaization_name='$org' AND vacancy_title='$jobtitle' AND 
			         total_grade >='50' ORDER BY total_grade DESC LIMIT $total_requested";
			$s = mysqli_query($con, $select);
			if(mysqli_num_rows($s)>0)
			{
			while ($row=mysqli_fetch_array($s))
			 {
			 $aid=$row['aid'];
			 $total=$row['total_grade'];
             //echo "<br>".$aid."=".$total."<br>";

			$sql="SELECT * FROM applicantdoc,applicantresult WHERE applicantdoc.aid='$aid' AND 
								applicantresult.aid='$aid' ORDER BY total_grade DESC";
			$s2 = mysqli_query($con, $sql);
			if(mysqli_num_rows($s2)>0)
			{
			while ($row1=mysqli_fetch_array($s2))
			{
			$health=$row1['health'];
			if($health=='Disabled')
			{
				echo "<br>".$health."Persons ID=".$aid;
				$sql2=mysqli_query($con,"UPDATE applicantresult SET status2='selected' WHERE aid='$aid'"); 
			}
		}
	}
			if($count1<=$search2)
			{
			 if($health=='Disabled')
			$count1++;
			$sql1=mysqli_query($con,"UPDATE applicantresult SET status2='selected' WHERE aid='$aid'");

			}
			 if($count2<=$search1)
				 {
				 	
				$sql1=mysqli_query($con,"UPDATE applicantresult SET status2='$stand' WHERE aid='$aid'");
			    //echo"<br>standby".$count2;
			    $count2++;
			    $stand++;
		        }
			}
			}
			}
			?>

        </li>
        </div>
                            <!-- /.panel-he
                            ading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
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

					$sql="SELECT * FROM applicantresult ORDER By organaization_name AND total_grade >=50 DESC";
				    $userexist=mysqli_query($con,$sql);
				    $c=mysqli_num_rows($userexist);
				    if($c >= '1')
				    {
					while($row = mysqli_fetch_assoc($userexist)){
					$interview=$row['interview'];
					$test=$row['test'];
					$app=$row['status2'];
					if ($interview>0 && $test>50 && $app!='Selected') {
			?>

				<tr>
				<td><?php echo $row['aid']; ?></td>
					<td><?php echo $row['afullname']; ?></td>
					<td><?php echo $row['sex']; ?></td>
					<td><?php echo $row['organaization_name']; ?></td>
					<td><?php echo $row['vacancy_title']; ?></td>	
					<td><?php echo $row['test']; ?></td>
					<td><?php echo $row['interview']; ?></td>
					<td><?php echo $row['total_grade']; ?></td>					
					<td><?php echo $row['interviewdate']; ?></td>
					<td><?php echo $row['status2']; ?></td>
					<td><?php echo $row['status3']; ?></td>


					<td>
					<a class="label btn btn-xs label-message" href=".php? doid=<?php echo $row['aid'];?>" role="button">
	    				<span class="glyphicon " aria-hidden="true">Edit</span>
	    			</a>
					</td><td>
					<a class="label btn btn-xs label-message" href="viewfinalresult.php? docid=<?php echo $row['aid'];?>" role="button">
	    				<span class="glyphicon " aria-hidden="true">Send</span>
	    			</a>
					</td>

					<!-- Send -->

					<?php
		            if (isset($_GET["docid"]))
		              {
		              $aid=$_GET["docid"];
		              $_SESSION['jid']=$aid;

		                $get_job = "SELECT * FROM applicantresult WHERE aid='$aid' ";
		                $run_job = mysqli_query($con, $get_job);


		                while ($row_job=mysqli_fetch_array($run_job)) {
		                $fullname=$row_job['afullname'];
		                $status2=$row_job['status2'];
		                
		                if($status2==Null) {
		                	echo "Result Can not Be Null";
		                }
		                else

		                $sql1=mysqli_query($con,"UPDATE applicantresult SET status3='Pending...' WHERE aid='$aid'");
		                		 
		                }
		            
		              ?>
				</tr>
			<?php
		      }
		  }
				}}
			}
			?>

	      	</tbody>

     	   </table>
            </div>
            </div>
            </div>

	  </form>
	  </div>
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