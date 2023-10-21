<?php
session_start();
include("includes/dbcon.php");

?>
<!DOCTYPE html>
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
        <ul>
          <li class="link ">
            <a href="registerjobdescription.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Job Description</span>
            </a>
          </li>

          <li class="link ">
            <a href="viewjobdescription.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Job Description</span>
            </a>
          </li>

          <li class="link ">
            <a href="registerlevel.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Level Type</span>
            </a>
          </li>

          <li class="link active">
            <a href="registercat.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register catagory</span>
            </a>
          </li>

          <li class="link ">
            <a href="registerorg.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Organization</span>
            </a>
          </li>

          <li class="link">
            <a href="viewrequestedapplicant.php">
            <span class="glyphicon glyphicon-user" aria-hidden></span>

            <?php
                $sql="select * from request where status='unseen'";
                $query = mysqli_query($con,$sql);
                $coun = mysqli_num_rows($query);
            ?>
            <span class="hidden-sm hidden-xs">View Requested App 
              <span class="label label-danger pull-right hidden-sm hidden-xs" ><?php echo $coun?></span>
            </span>
            </a>
          </li>

          <li class="link ">
            <a href="postvacancy.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Post Vacancy</span>
            </a>
          </li>
          <li class="link ">
            <a href="viewpostedvacancy.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Posted Vacancy</span>
            </a>
           </li>

          <li class="link ">
            <a href="registerapplicant.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Applicants</span>
            </a>
            </li>

            <li class="link ">
            <a href="viewjobseekerdoc.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Job Seeker Doc</span>
            </a>
          </li>
            <li class="link active">
            <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              <span class="hidden-sm hidden-xs">View App Result</span>
              <span class="label label-success pull-right hidden-sm hidden-xs" >20</span>
            </a>
            <ul class="collapse collapseable" id="collapse-post">
              <li><a href="viewapplicantresult.php">View Test Result</a></li>
              <li><a href="viewfinalresult.php">View Final Result</a></li>
              <li><a href="viewpracticalresult.php">View practical Result</a></li>
            </ul>
          </li>


          </li>
          
          <li class="link settings-btn">
            <a href="settings.html">
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
        <ul class="pull-right">
          <li id="wellcome" class="hidden-xs">welcome to your Employer page</li>
          <li>
          <a href="#" class="logout">
          <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
          Logout
          </a>
          </li>
        </ul>
      </div>
    </header>
  </div>

       <div class="container">
    <form action="registercat.php" method="post"  enctype="multipart/form-data">
      <div class="row">
        <h4>Register Job Category</h4>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="catid" placeholder="Category Id" required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="catname" placeholder="Category Name" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="catregdate" readonly value="<?php echo date("d/m/y"); ?> E.C"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        
        
        <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Register"/>
          <div class="input-icon"></div>
        </div>
        
      </div>

      <?php
          if(isset($_POST["submit"]))
          {
            $catid=$_POST["catid"];
            $catname=$_POST["catname"];
            $catregdate=$_POST["catregdate"];

            if($con)
                $sql="insert into category values('$catid','$catname','$catregdate','$eid')";
                $inserted=mysqli_query($con, $sql);
                if($con)
                  echo "Job Category Registerd successfully!";
                else  
                  echo "Unable to Registerd Category" .mysqli_error();
           }       
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