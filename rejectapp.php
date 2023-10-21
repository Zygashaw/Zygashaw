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
    <form action="rejectapp.php" method="post"  enctype="multipart/form-data">
	    <div class="row">
		        <h4>Regect Applicants</h4>

		         <!-- Reject -->
  			      <?php

                  if (isset($_GET["docid"]))
                    {
                    $aid=$_GET["docid"];
                    $_SESSION['aid']=$aid;

                      $get_job = "SELECT * FROM applicantdoc WHERE aid='$aid' ";
                      $run_job = mysqli_query($con, $get_job);
                      while ($row_job=mysqli_fetch_array($run_job)) {
   
                  
                   ?>
	        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	          <input type="text" name="aid" value="<?php echo "$aid"; ?>"placeholder="aid"/>
	          <div class="input-icon"><i class="fa fa-envelope"></i></div>
	        </div>
	        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	          <input type="text" name="response"  placeholder="Reason" required/>
	          <div class="input-icon"><i class="fa fa-envelope"></i></div>
		     </div>
		     <div class="input-group " style="width:417px; margin-left:42px;">
	          <input type="submit" name="submit" class="btn btn-primary" value="REJECT"/>
	          <div class="input-icon"></div>
	        </div>
	      </div>

		     <?php 
		     }
 
                }
            
              ?>

		     <?php
  			      if(isset($_POST["submit"]))
  			      {
  			          $aid=$_POST["aid"];
  			          $response=$_POST["response"];

  			          $sql1="UPDATE applicantdoc SET status='$response' WHERE aid='$aid'";
  					      $updated=mysqli_query($con,$sql1);

  					     if($updated)
  			                {
  			                  	 echo "<script> alert('Applicant Got Rejected!') </script>";
  			                     echo "<script> window.open('viewjobseekerdoc.php','_self') </script>";

  					        }else
  			                     echo "<script> alert('Applicant Not Rejected!') </script> .mysql_error()";
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