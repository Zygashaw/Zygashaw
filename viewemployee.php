<?php
include("includes/dbcon.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin</title>

  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/default.css">
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
<?php
if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
  $eid=$_SESSION['eid'];
  $photo=$_SESSION['sphoto'];
  $name=$_SESSION['sun'];

?>
<div class="container-fluid display-table">
		<div class="row display-table-row">

		<!--side menu-->

		<div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
			<h1 class="hidden-xs hidden-sm">Navigation</h1>
      <ul>
        <li class="link ">
          <a href="dashboard.php">
          <span class="glyphicon glyphicon-th" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Dashboard</span>
          </a>
        </li>

        <li class="link ">
          <a href="registerorg.php">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">Register Org And Level</span>
          </a>
        </li>
        <li class="link ">
          <a href="registeremployee.php">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">Register Employee</span>
          </a>
        </li>

        <li class="link active">
          <a href="viewemployee.php">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">View Employees</span>
            <?php
                $sql="SELECT * from employee";
                $query = mysqli_query($con,$sql);
                $coun = mysqli_num_rows($query);
            ?>
            <span class="label label-success pull-right hidden-sm hidden-xs" ><?php echo $coun?></span>
          </a>
        </li>

        <li class="link">
          <a href="comments.php">
          <span class="glyphicon glyphicon-user" aria-hidden></span>
          <span class="hidden-sm hidden-xs">View Comments</span>
          <?php
                $sql="SELECT * from comment";
                $query = mysqli_query($con,$sql);
                $coun = mysqli_num_rows($query);
            ?>
            <span class="label label-success pull-right hidden-sm hidden-xs" ><?php echo $coun?></span>
          </a>
        </li>

        <li class="link">
          <a href="backup.php">
          <span class="glyphicon glyphicon-tags" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Take Backup</span>
          </a>
        </li>

        <li class="link">
          <a href="restore.php">
          <span class="glyphicon glyphicon-tags" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Rstore DB</span>
          </a>
        </li>
        
        <li class="link settings-btn">
          <a href="adminsetting.php">
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
     </div>
    <div class="col-md-7">
      <ul class="pull-right" style=" margin-right:65px; ">
          <li id="wellcome" class="hidden-xs">welcome to your Admistrator page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i> <?php echo $name; ?> <b class="caret"></b>
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

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
        <h4>Employee Details</h4>
        <table class="table table-stried table-border table-hover">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Sex</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Organaization</th>
                <th>Username</th>
                <th>Role</th>
                <th>Position</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
      
      
      <?php
                if($con)
                {

                  $sql1="SELECT * from account";
                  $re=mysqli_query($con,$sql1);

                    while($row1 = mysqli_fetch_assoc($re)){
                      $id=$row1['uid'];
                    $sql="SELECT * from employee WHERE eid='$id'";
                    $record=mysqli_query($con,$sql);

                    $row = mysqli_fetch_assoc($record);
                
            ?>

                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['sex']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['workplace']; ?></td>
                    <td><?php echo $row1['username']; ?></td>
                    <td><?php echo $row1['role']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row1['status']; ?></td>
                    <?php
                    if($row1['status'] == 'Active'){
                    ?>
                    <td>
                    <a class="label btn btn-xs label-message" href=" viewemployee.php? blockid=<?php echo $row['eid'];?>" role="button">
                        <span class="glyphicon " aria-hidden="true">&nbsp;Block</span>
                    </a>
                    </td>
                    <?php
                    }
                    else{
                      ?>
                      <td>
                    <a class="label btn btn-xs label-message" href=" viewemployee.php? unblock=<?php echo $row['eid'];?>" role="button">
                        <span class="glyphicon " aria-hidden="true">&nbsp;Unblock</span>
                    </a>
                    </td><?php }
                    ?>

                </tr>
                <?php
              }
                }
            ?>

                
            </tbody>
      </table>

      <!-- Block -->
              <?php

                  if (isset($_GET["blockid"]))
                    {
                    $uid=$_GET["blockid"];
                    $_SESSION['uid']=$uid;

                      $get_job = "SELECT * FROM account WHERE uid='$uid' ";
                      $run_job = mysqli_query($con, $get_job);
                      while ($row_job=mysqli_fetch_array($run_job)) {

                        $sql1="UPDATE account SET status='Blocked' WHERE uid='$uid'";
                        $updated=mysqli_query($con,$sql1);
   
                        if($updated)
                        {
                             echo "<script> alert('Employee Blocked!!') </script>";
                             echo "<script> window.open('viewemployee.php','_self') </script>";

                    }else
                             echo "<script> alert('You Can Not Block!!') </script> ".mysqli_error($con);
                    }
                  }
                   ?>
      </div>

      <!-- Unblock -->
              <?php

                  if (isset($_GET["unblock"]))
                    {
                    $eid=$_GET["unblock"];
                    $_SESSION['eid']=$eid;

                      $get_job ="SELECT * FROM account WHERE uid='$eid'";
                      $run_job = mysqli_query($con, $get_job);
                      while ($row_job=mysqli_fetch_array($run_job)) {

                        $sql1="UPDATE account SET status='Active' WHERE uid='$eid'";
                        $updated=mysqli_query($con,$sql1);
   
                        if($updated)
                        {
                             echo "<script> alert('Employee Activated!!') </script>";
                             echo "<script> window.open('viewemployee.php','_self') </script>";

                    }else
                             echo "<script> alert('You Can Not Activate!!') </script> ".mysqli_error($con);
                    }
                  }else
                      echo mysqli_error($con);
                   ?>
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
<?php
}
else
{
header("location:admin/index.php");
}
?>
</body>
</html>