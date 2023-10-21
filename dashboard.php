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
			<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
      <ul>
        <li class="link active">
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

        <li class="link">
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
      <ul class="pull-right" style=" margin-right:75px; ">
          <li id="wellcome" class="hidden-xs">welcome to your Administrator page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i> <?php echo "$name";?> <b class="caret"></b>
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
    <form>
      <div class="row">
        <h4>DASHBOARD</h4>
        
        
      </div>
      <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                        $sql="SELECT * from job_desc";
                                        $query = mysqli_query($con,$sql);
                                        $coun = mysqli_num_rows($query);
                                    ?>
                                        <div class="huge"><?php echo $coun?></div>
                                        <div>Job Description!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adminviewjobdesc.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $sql="SELECT * from level";
                                        $query = mysqli_query($con,$sql);
                                        $coun = mysqli_num_rows($query);
                                    ?>
                                        <div class="huge"><?php echo $coun?></div>
                                        <div>All Levels!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adminviewlevel.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>All Categorys!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adminviewcategory.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $sql="SELECT * from request";
                                        $query = mysqli_query($con,$sql);
                                        $coun = mysqli_num_rows($query);
                                    ?>
                                        <div class="huge"><?php echo $coun?></div>
                                        <div>All Requestes!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adminviewrequest.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $sql="SELECT * from applicantdoc";
                                        $query = mysqli_query($con,$sql);
                                        $coun = mysqli_num_rows($query);
                                    ?>
                                        <div class="huge"><?php echo $coun?></div>
                                        <div>Jobseeker Documents!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adminviewjobseekerdoc.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $sql="SELECT * from applicantresult";
                                        $query = mysqli_query($con,$sql);
                                        $coun = mysqli_num_rows($query);
                                    ?>
                                        <div class="huge"><?php echo $coun?></div>
                                        <div>View Results!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adminviewresult.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>All Categorys!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $sql="SELECT * from applicantresult";
                                        $query = mysqli_query($con,$sql);
                                        $coun = mysqli_num_rows($query);
                                    ?>
                                        <div class="huge"><?php echo $coun?></div>
                                        <div>View All Organaizations!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="adminvieworg.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

      
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