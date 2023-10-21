<!DOCTYPE html>

<?php
include("includes/dbcon.php");

?>

<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Appliccant</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  <div class="container-fluid display-table">
    <div class="row display-table-row"> 

    <!--side menu-->

      <div class="col-md-2 col-sm-1 hidden-xs display-table-cell " id="side-menu">
        <h1 class="hidden-xs hidden-sm">Job Tracking</h1>
        <ul>
          <li class="link">
            <a href="registerjobdescription.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Job Description</span>
            </a>
          </li>

          <li class="link active">
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

          <li class="link ">
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
          
            <li class="link ">
            <a href="registerapplicantsresult.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Apps Result</span>
            </a>
          </li>

               <li class="link ">
            <a href="viewapplicantsresult.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Applicants Result</span>
            </a>
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

        <div class="col-md-10 col-sm-11 display-table-cell valign-top">
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

    <form action="editjobdescription.php" method="post"  enctype="multipart/form-data">
      <div class="row">
        <h4>Edit Job Description</h4>
        <?php 
            if (isset($_GET["editid"]))
              {
              $eid=$_GET["editid"];
              $get_job = "select * from job_desc where job_id='$eid' ";
              $run_job = mysqli_query($con, $get_job);
              while ($row_job=mysqli_fetch_array($run_job)) {
              $eid=$row_job['job_id']; 
              $jobtitle=$row_job['job_title'];
              $joblevel=$row_job['level_type']; 
              $cat_name=$row_job['cat_name'];
              $permissible=$row_job['permissible'];
              $orgname=$row_job['orgname'];   
            }
            ?>
         <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="jobid" value="<?php echo "$eid"; ?>" placeholder="Job Id"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>


        
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="jobtitle" value="<?php echo "$jobtitle"; ?>" placeholder="Job Title"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="leveltype" value="<?php echo "$joblevel"; ?>" placeholder="Level"/>
          <div class="input-icon"><i class="fa fa-key"></i></div>
          <?php } ?>
        </div>

        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="cat_name" value="<?php echo "$cat_name"; ?>" placeholder="Job Category"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="perm" value="<?php echo "$permissible"; ?>" placeholder="Permissible"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="perm" value="<?php echo "$orgname"; ?>" placeholder=""/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>


        <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="update" class="btn btn-primary" value="Update Now!"/>
          <div class="input-icon"></div>
        </div>
      </div>
      
    </form>
    
    <?php
          if(isset($_POST["update"]))
      {
          $jobidentity=$_POST["jobid"];
          $jobtitle=$_POST["jobtitle"];
          $leveltype=$_POST["leveltype"];
          $organname=$_POST["organizationname"];
          $cat_name=$_POST["cat_name"];
          $perm=$_POST["perm"];
          if($jobidentity!=null){

if($con)
{
         $sql="insert into  values(,,$jobidentity''$jobtitle','$leveltype','$organname','$cat_name'
          ,'$perm')";
          $inserted=mysqli_query($con, $sql);
          if($inserted)
          {

            echo "<script> alert('Job Requested successfully!') </script>";
            echo "<script> window.open('requestapplicants.php','_self') </script>";

         }
         else
          echo "<script> alert('Job not Updated successfully!') </script> .mysql_error()";
       } } 
          else
          echo "<script> alert('First Fill Job Description!').mysql_error() </script>";  
     }
  ?>
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
</body>
</html>
