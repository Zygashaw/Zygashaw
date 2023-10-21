<?php
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
  $eid=$_SESSION['eid'];
  $name=$_SESSION['sun'];
  $photo=$_SESSION['sphoto'];

?>
     <ul>
          <li class="link">
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

          <li class="link">
            <a href="viewrequestedapplicant.php">
            <span class="glyphicon glyphicon-user" aria-hidden></span>

            <?php
                $sql="select * from request where status='Pending...'";
                $query = mysqli_query($con,$sql);
                $coun = mysqli_num_rows($query);
            ?>
            <span class="hidden-sm hidden-xs">View Requested App 
              <span class="label label-danger pull-right hidden-sm hidden-xs" ><?php echo $coun?></span>
            </span>
            </a>
          </li>

          <li class="link ">
            <a href="viewpostedvacancy.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Posted Vacancy</span>
            </a>
           </li>

          <!-- <li class="link ">
            <a href="registerapplicant.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Applicants</span>
            </a>
          </li> -->

          <li class="link ">
            <a href="viewjobseekerdoc.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>

            <?php
                $sql="SELECT * FROM applicantdoc WHERE status='Pending...'";
                $query = mysqli_query($con,$sql);
                $coun = mysqli_num_rows($query);
            ?>
            <span class="hidden-sm hidden-xs">View Job Seeker Doc</span>
            <span class="label label-warning pull-right hidden-sm hidden-xs" ><?php echo $coun?></span>
            </a>
          </li>

          <li class="link ">
            <a href="approvedjobseekers.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Fill Test</span>
            </a>
          </li>
          <li class="link ">
            <a href="fillpractical.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Fill Practical</span>
            </a>
          </li>

          <li class="link ">
            <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              <span class="hidden-sm hidden-xs">View App Result</span>
              <span class="label label-success pull-right hidden-sm hidden-xs" >20</span>
            </a>
            <ul class="collapse collapseable" id="collapse-post">
              <li><a href="viewapplicantresult.php">View Test Result</a></li>
              <li><a href="viewfinalresult.php">View Final Test Result</a></li>
              <li><a href="viewpracticalresult.php">View practical Result</a></li>
              <li><a href="viewfinalpracticalresult.php">View Final practical Result</a></li>
              
            </ul>
          </li>

          <li class="link ">
            <a href="viewapprovedemployee.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Approved Employee</span>
            </a>
           </li>


          </li>
          
          <li class="link settings-btn">
            <a href="employersetting.php">
            <span class="glyphicon glyphicon-cog" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Settings</span>
            </a>
          </li>
        </ul>

<?php
}
else
{
header("location:admin/index.php");
}
?>
        </body>
        </html>