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
    <title>Request Appliccant</title>

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
  $name=$_SESSION['fullname'];
?>
  <div class="container-fluid display-table">
    <div class="row display-table-row"> 

    <!--side menu-->

      <div class="col-md-2 col-sm-1 hidden-xs display-table-cell " id="side-menu">
        <h1 class="hidden-xs hidden-sm">Job Tracking</h1>
        <ul>
               <li class="link ">
            <a href="viewjobdesc.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Job Description</span>
            </a>
          </li>

          <li class="link active">
            <a href="requestapplicants.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Request Applicant</span>
            </a>
          </li>

          <li class="link ">
            <a href="officerviewactivties.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Activies</span>
            </a>
          </li>

          <li class="link ">
            <a href="viewhiredemployee.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Hired Employee</span>
            </a>
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
          <a href="logout.php" class="logout">
          <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
          Logout
          </a>
          </li>
        </ul>
      </div>
    </header>
  </div>

       <div class="container">

    <form action="updaterequest.php" method="POST"  enctype="multipart/form-data">
      <div class="row">
        <h4>Request Applicant</h4>

        <?php

            if (isset($_GET["job_id"]))
              {
              $jid=$_GET["job_id"];
              $_SESSION['jid']=$jid;

                $get_job = "SELECT * FROM request WHERE job_id='$jid' AND status='Pending...'";
                $run_job = mysqli_query($con, $get_job);
                while ($row_job=mysqli_fetch_array($run_job)) {
                  $jid=$row_job['job_id']; 
                  $jobtitle=$row_job['jobtitle'];
                  $joblevel=$row_job['leveltype']; 
                  $orgname=$row_job['organaization_name'];
                  $requested1=$row_job['requestedno'];
                  $_SESSION['requested1']=$requested1;
                  $description=$row_job['description'];
                  $workdate=$row_job['work_starting_date'];
                  $budgetavailablity=$row_job['budget_availablity_checked_by'];

                }
              ?>
           <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <input type="text" name="jobid" readonly value="<?php echo "$jid"; ?>" placeholder="Job Id"/>
            <div class="input-icon"><i class="fa fa-user"></i></div>
          </div>
   
          <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <input type="text" name="jobtitle" readonly value="<?php echo "$jobtitle"; ?>" placeholder="Job Title"/>
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
          </div>
          <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <input type="text" name="leveltype" readonly value="<?php echo "$joblevel"; ?>" placeholder="Level"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
            
          </div>

          <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <input type="text" name="orgname" readonly value="<?php echo "$orgname"; ?>" placeholder="Organaization Name"/>
            <div class="input-icon"><i class="fa fa-user"></i></div>
          </div>
          <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <input type="text" name="permissible" value="<?php echo "$requested1"; ?>" placeholder="Organaization Name"/>
            <div class="input-icon"><i class="fa fa-user"></i></div>
          </div>

        <div class="form-group">
            <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span>
            <select name="workprocess"> 
            <option>Select Work Process</option>
            <option>InternalTransfer</option>
            <option>ExternalTransfer</option>
            <option>Promotion</option>
            <option>Hiring</option>
            </select>
        </div> 
        </div>
        </div>

        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
           <label class="sr-only">Work Description</label>
           <textarea class="form-control" value="<?php echo "$description"; ?>"placeholder="Work Expriance" name="description"></textarea>
         </div>

        <label style="margin-left:42px;">* Applicant Work Starting Date</label>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="date" name="date1" value="<?php echo "$workdate"; ?>" placeholder="Work Starting Date"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="requestedby" value="<?php echo "$name"; ?>" placeholder="Requested By"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="tesxt" name="budgetavailablity" value="<?php echo "$budgetavailablity"; ?>" placeholder="Budget Availablity Cheched By"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="requesteddate" value="<?php echo date("d/m/y"); ?> E.C" readonly />
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <?php
          } 
        ?>

        <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Update Now!"/>
          <div class="input-icon"></div>
        </div>
      </div>
      
    </form>
    
    <?php
      if(isset($_POST["submit"]))
      {
          $jobidentity=$_POST["jobid"];
          $jobtitle=$_POST["jobtitle"];
          $leveltype=$_POST["leveltype"];
          $organname=$_POST["orgname"];
          $New_permissible=$_POST["permissible"];
          $workprocess=$_POST["workprocess"];
          $description=$_POST["description"];
          $date1=$_POST["date1"];
          $requestedby=$_POST["requestedby"];
          $budgetavailablity=$_POST["budgetavailablity"];
          $id=$_SESSION['jid'];


          $sql="SELECT * FROM job_desc WHERE job_id='$jobidentity'";
          $update=mysqli_query($con, $sql);
            while ($row_job=mysqli_fetch_array($update)) {

                $Available_permissible=$row_job['permissible'];
                $requested1=$_SESSION['requested1'];

                  $sql4="SELECT * FROM request WHERE requestedno='$requested1' AND job_id='$id'";
                  $Select1=mysqli_query($con, $sql4);
                    while ($row_job1=mysqli_fetch_array($Select1)) {

                      if($New_permissible > $Available_permissible){
                          echo "<font color='red'><script> alert('Requested Number Is More Than Permissible!!')</script></font> ".mysqli_error();
                          echo "<script> window.open('updaterequest.php','_self') </script>";
                      }
                      else if($New_permissible <= $Available_permissible){
                        $Requested_Permmissble=$row_job1['requestedno'];
                        echo $Total_permissble=$Available_permissible + $Requested_Permmissble."<br";
                        echo $Last_permissible=$Total_permissble - $New_permissible;
                        $_SESSION['Last_permissible']=$Last_permissible;
                        $Last_permissible=$_SESSION['Last_permissible'];
                      }
                    }
                  }

               $sql="UPDATE request SET description='$description', requestedno='$New_permissible', work_starting_date='$date1' WHERE job_id='$id'";
               $update2=mysqli_query($con, $sql);

                 $sql1="UPDATE job_desc SET permissible='$Last_permissible' WHERE job_id='$id'";
                 $update3=mysqli_query($con, $sql1);

                  if($update3)
                  {

                     echo "<script> alert('Job Updated successfully!') </script>".mysqli_error($con);
                     echo "<script> window.open('updaterequest.php','_self') </script>";
                    // echo "successfully".mysqli_error($con);
                    }

              
                    else
                echo "<script> alert('Job Request Not Updated successfully!') </script> ".mysqli_error();
 
     }
  ?>
    

    

<div class="row">
  <footer id="admin-footer" class="clearfix">
    <div class="pull-left"><b>Copyright</b> &copy; 2018</div>
    <div class="pull-right">admin system</div>
  </footer>
</div>
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