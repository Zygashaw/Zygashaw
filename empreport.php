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
    <title>View Approved Employee</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- DataTables CSS -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="css/dataTables.responsive.css" rel="stylesheet">

    <script language="javascript">
    function Clickheretoprint()
    { 
      var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
          disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
      var content_vlue = document.getElementById("print_content").innerHTML; 
      
      var docprint=window.open("","",disp_setting); 
       docprint.document.open(); 
       docprint.document.write('<html><head><title>Hired Employee</title>'); 
       docprint.document.write('</head><body onLoad="self.print()" style="width:600px;border:-10px solid ;margin-left:400px; font-size:16px; font-family:TimesNewRoman;">');          
       docprint.document.write(content_vlue);          
       docprint.document.write('</body></html>'); 
       docprint.document.close(); 
       docprint.focus(); 
    }
</script>

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
    <form action="viewapprovedemployee.php" method="post"  enctype="multipart/form-data">
      <div class="row">


        <h4>View Report</h4> 
        <?php include("print.php"); ?>
            <p class="pull-right">Date:<?php echo date("d/m/y"); ?> E.C</p>
            <p><h4 align="center">Hiring Report</h4></p>
              
            <?php

            if (isset($_GET["repid"]))
              {
              $repid=$_GET["repid"];
              $_SESSION['srepid']=$repid;

                $get_job = "SELECT * FROM applicantresult where aid='$repid' ";
                $run_job = mysqli_query($con, $get_job);
                while ($row_job=mysqli_fetch_array($run_job)) {
                  $aid=$row_job['aid']; 
                  $_SESSION['scid']=$aid;
                  $aid=$_SESSION['scid'];
                  $status4=$row_job['status4'];
                  $_SESSION['status4']=$status4;
                  $org=$_SESSION['status4'];
                }
              ?>

            <?php
                if($con)

                {

                  $sql="SELECT * FROM applicantresult WHERE status3='Approved' AND status2='selected' AND status4='$org' AND aid='$aid'";
                    $userexist=mysqli_query($con,$sql);
                    $c=mysqli_num_rows($userexist);
                    if($c >= '1')
                    {
                       while($row = mysqli_fetch_assoc($userexist)){
                        $aid=$row['aid'];
                        $_SESSION['said']=$aid;
                        $orgname=$row['organaization_name'];
                        $_SESSION['orgname']=$orgname;
                        $jobtitle=$row['vacancy_title'];
                        $_SESSION['jobtitle']=$jobtitle;
                        ?>

                      <p><font style="margin-left:50px;"><b>TO:</b>&nbsp;&nbsp;<?php echo $row['organaization_name']."<br>";?></font></p>
                      <p><font style="margin-left:50px;"><b>As You Have Asked Us We Hired:</b>&nbsp;&nbsp;<?php echo $row['afullname']."<br>";?></font></p>
                      <?php 
                        $sql1="SELECT * FROM postvacany WHERE jobtitle='$jobtitle' AND organaization_name='$orgname'";
                            $userexist1=mysqli_query($con,$sql1);
                            $c1=mysqli_num_rows($userexist1);
                            if($c1 >= '1')
                            {
                             while($row1 = mysqli_fetch_assoc($userexist1)){
                                 $aid=$row1['vid']; 
                                 $jobtitle=$row1['jobtitle'];
                                 $pdate=$row1['posted_date'];
                                 $leveltype=$row1['leveltype'];
                                 $wdesc=$row1['workdescription'];
                                 //echo $aid;
                               }
                             }
                           }
                          ?>
                      <p><font style="margin-left:50px;"><b>For Post Vacancy ID:</b>&nbsp;&nbsp;<?php echo $aid."<br>";?></font></p>
                      <p><font style="margin-left:50px;"><b>Vacancy Name:</b>&nbsp;&nbsp;<?php echo $jobtitle."<br>";?></font></p>
                      <p><font style="margin-left:50px;"><b>Job Level:</b>&nbsp;&nbsp;<?php echo $leveltype."<br>";?></font></p>
                      <p><font style="margin-left:50px;"><b>Vacancy Posted Date:</b>&nbsp;&nbsp;<?php echo $pdate."<br>";?></font></p> 
                      <p><font style="margin-left:50px;"><b>Work Description:</b>&nbsp;&nbsp;<?php echo $wdesc."<br>";?></font></p>
                      <p><font style="margin-left:50px;"><b>Starting From:</b>&nbsp;&nbsp;<?php echo date('Y-m-d')."<br>";?></font></p>
                      <p><font style="margin-left:50px;"><b>We Approved This Employee To Work On Your Company Resposibly And Honestly!</b>&nbsp;&nbsp;<?php echo"<br>";?></font></p>
                      <p><font style="margin-left:50px;"><b>Signiture:----------------</b></font></p>
                      <!-- <font style="margin-left:50px;">

                      <span><a class="label btn btn-xs label-message"  role="button">Print</a>
                      </span>
                      </font> -->
                      

                      <?php
                }
            }
        }
        ?>

        <!-- Recived -->
        <?php

                if (isset($_GET["recived"]))
                  {
                  $recived=$_GET["recived"];

                    $get_job = "SELECT * FROM applicantresult WHERE aid='$recived'";
                    $run_job = mysqli_query($con, $get_job);
                    while ($row_job=mysqli_fetch_array($run_job))
                     {
                    $aid=$row_job['aid'];
                }

                    $sql1="UPDATE applicantresult SET status4=' ' , Assign='Recived' WHERE aid='$aid'";
                    $updated1=mysqli_query($con,$sql1);
                    if ($updated1) 
                    {
                      echo "Printed";
                    
                      
                      }
                     }
                
                  ?>
      
        </div> 
        </div>
    <!-- </div> -->

  
  

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
<script src="js/jquery.min.js"></script>
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