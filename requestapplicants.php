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
  $name=$_SESSION['sun'];
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
        <ul class="pull-right" style=" margin-right:65px; ">
          <li id="wellcome" class="hidden-xs">welcome to your Employer page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i><?php echo "$name";?> <b class="caret"></b>
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

    <form action="requestapplicants.php" method="post"  enctype="multipart/form-data">
      <div class="row">
        <h4>Request Applicant</h4>

        <?php

            if (isset($_GET["job_id"]))
              {
              $jid=$_GET["job_id"];
              $_SESSION['jid']=$jid;

                $get_job = "select * from job_desc where job_id='$jid' ";
                $run_job = mysqli_query($con, $get_job);
                while ($row_job=mysqli_fetch_array($run_job)) {
                  $jid=$row_job['job_id']; 
                  $jobtitle=$row_job['job_title'];
                  $joblevel=$row_job['level_type']; 
                  $orgname=$row_job['orgname'];
                  $permissible=$row_job['permissible'];  
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
            <input type="text" name="permissible" value="<?php echo "$permissible"; ?>" placeholder="Permissible"/>
            <div class="input-icon"><i class="fa fa-user"></i></div>
          </div>
          
        <?php
              } ?>
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
           <textarea class="form-control" placeholder="Work Expriance" name="description"></textarea>
         </div>

        <label style="margin-left:42px;">* Applicant Work Starting Date</label>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="date" name="date1" placeholder="Work Starting Date"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="requestedby" value="<?php echo "$name"; ?>" placeholder="Requested By"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="tesxt" name="budgetavailablity" placeholder="Budget Availablity Cheched By"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="requesteddate" value="<?php echo date("d/m/y"); ?> E.C" readonly />
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        

        <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Request Now!"/>
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
          $permissible=$_POST["permissible"];
          $workprocess=$_POST["workprocess"];
          $description=$_POST["description"];
          $date1=$_POST["date1"];
          $requestedby=$_POST["requestedby"];
          $budgetavailablity=$_POST["budgetavailablity"];
          $id=$_SESSION['jid'];
          
            $query= "SELECT * FROM request WHERE jobtitle='$jobtitle' AND status='pending...' AND organaization_name='$organname'";
            $exist=mysqli_query($con,$query);

            if(mysqli_num_rows($exist)>0)
              {
            ?>
              <div class="panel-body" style="">
              <div class="alert alert-danger">
                 <script> alert('You Cannot Request Until Your Request Got Approved!!');</script>
                 <script> window.open('viewjobdesc.php','_self'); </script>    
              </div>
              </div>
            <?php
              }
              else
            {
               $sql="INSERT INTO request VALUES(' ','$jobtitle','$leveltype','$organname','$workprocess'
                ,'$description','$permissible','$date1','$requestedby','$budgetavailablity','pending...','$jobidentity','$eid')";
              
                $inserted=mysqli_query($con, $sql);
                  if($inserted)
                  {
                    $get_job = "SELECT * FROM job_desc WHERE job_id='$id'";
                    $run_job = mysqli_query($con, $get_job);
                    if($row=mysqli_fetch_array($run_job))
                    {
                      $perm=$row['permissible'];
                      $resultperm=$perm-$permissible;

                      $sql1="UPDATE job_desc SET permissible='$resultperm' WHERE job_id='$id'";
                      $updated1=mysqli_query($con,$sql1);

                     echo "<script> alert('Job Requested successfully!') </script>";
                     echo "<script> window.open('viewjobdesc.php','_self') </script>";
                    }

                    }
                    else
                echo "<script> alert('Job not Requested successfully!') </script>".mysqli_error($con);
               }
                
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