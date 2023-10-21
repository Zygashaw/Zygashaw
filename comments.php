<?php
session_start();
include("includes/dbcon.php");
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

        <li class="link ">
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

        <li class="link active">
          <a href="comments.php">
          <span class="glyphicon glyphicon-user" aria-hidden></span>
          <span class="hidden-sm hidden-xs">View Comments</span>
          <?php
                $sql="SELECT * from employee";
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
          <a href="viewemployee.php">
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
    <form action="" method="POST">
      <div class="row">
        <h4>DASHBOARD</h4>
        <table class="table table-stried table-border table-hover">
        <thead>
          <tr>
            <th>Comment Id</th>
            <th>Commenter Name</th>
            <th>Commenter Email</th>
            <th>Comment Content</th>
            <th>Commented Date</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody>
        
        <?php 

            $get_comment = "SELECT * FROM comment";
            $run_comment = mysqli_query($con, $get_comment);
            while ($row_comment=mysqli_fetch_array($run_comment)) {

            

        ?>
          <tr>
          <td><?php echo $row_comment['comment_id']; ?></td>
          <td><?php echo $row_comment['comment_author']; ?></td>
          <td><?php echo $row_comment['comment_author_email']; ?></td>
          <td><?php echo $row_comment['comment_content']; ?></td>
          <td><?php echo $row_comment['comment_date']; ?></td>
          <!-- <td><a class="label btn btn-outline btn-success" href="updateorg.php? 
          updateorg=<?php echo $row['orgid'];?>" role="button">Approve</a>
          <a class="label btn btn-outline btn-danger" href="updateorg.php? 
          updateorg=<?php echo $row['orgid'];?>" role="button">DisApprove</a></td> -->
        </tr>
        <?php
}
            ?>
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

<?php
}
else
{
header("location:admin/index.php");
}
?>
</body>
</html>