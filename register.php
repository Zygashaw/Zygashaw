  <!DOCTYPE html>
  <?php
  include("includes/dbcon.php");
  ?>
  <html lang="en">
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apply Job</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/register.css">
    <link href="css/clean-blog.min.css" rel="stylesheet">
    
  </head>
  <body>
  <!--NAVIGATION-->
  <div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
  <a class="navbar-brand" href="index.php">JOB TRACKING</a>
  <div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
  </button>

  </div>
  <div class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
     <li><a href="index.php">Home</a></li>
     <li><a href="post.php">Jobs</a></li>
     <li><a href="appviewresult.php">View Result</a></li>
     <li><a href="contact.php">Contact</a></li>
     <li><a href="login.php">Login</a></li>
  </ul>
  </div>
  </div>
  </div>
  <!--END NAVIGATION-->

  <div class="container">
  <div class="col-lg-9">
  <br>
  <br>
  <!-- Main Content-->

  <form class="form-horizontal" action="" method="post" id="reg_form" enctype="multipart/form-data">
  <fieldset>
  <!--Form Name-->
  <legend><h3 style="margin-left:300px; margin-top=350px;">JobSeeker Personal Information</h3></legend>


  <?php 
              if (isset($_GET["jtitle"]))
                {
                $jtitle=$_GET["jtitle"];
                $get_job = "SELECT * FROM postvacany WHERE jobtitle='$jtitle' ";
                $run_job = mysqli_query($con, $get_job);

                while ($row_job=mysqli_fetch_array($run_job)) {
                $jid=$row_job['jobid']; 
                $jtitle=$row_job['jobtitle'];
                $org=$row_job['organaization_name']; 
                 $level=$row_job['leveltype'];
              }
              ?>

  <!--Text Input-->


  <div class="form-group">
  <label class="col-md-4 control-label"> Job Title:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-earphone"></i></span>
  <input name="jobtitle" class="form-control" type="text" value="<?php echo "$jtitle"; ?>" readonly>
  </div> 
  </div>
  </div>

  <div class="form-group">
  <label class="col-md-4 control-label"> Organization Name:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-earphone"></i></span>
  <input name="orgname" class="form-control" type="text" value="<?php echo "$org"; ?>" readonly>
  </div> 
  </div>
  </div>

  <div class="form-group">
  <label class="col-md-4 control-label"> Level:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-earphone"></i></span>
  <input name="level" class="form-control" type="text" value="<?php echo "$level"; ?>" readonly>
  </div> 
  </div>
  </div>

  <div class="form-group">
  <label class="col-md-4 control-label">Full Name:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-user"></i></span>
  <input name="fullname" class="form-control" type="text" autofocus>
  </div>
  </div>
  </div>

  <!--Text Input-->
  <div class="form-group">
  <label class="col-md-4 control-label"> Sex:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-list"></i></span>
  <select name="sex" class="form-control selectpicker"> <option value="">Please select your Sex</option>
  <option>Male</option>
  <option>Female</option>
  </select>
  </div> 
  </div>
  </div>

  <!--Text Input-->

  <div class="form-group">
  <label class="col-md-4 control-label"> Phone:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-earphone"></i></span>
  <input name="phone" pattern="[0-9+ ]+" maxlength="13" minlength="13" value="+251 " class="form-control" type="tel">
  </div> 
  </div>
  </div>

  <!--Text Input-->

  <div class="form-group">
  <label class="col-md-4 control-label"> Educational Level:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-earphone"></i></span>
  <input name="edulevel" class="form-control" type="text">
  </div> 
  </div>
  </div>

  <!--Text Input-->

  <div class="form-group">
  <label class="col-md-4 control-label"> Work Experiance(Years):</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-earphone"></i></span>
  <input name="workexp" class="form-control" type="text" placeholder="">
  </div> 
  </div>
  </div>

  <!--Text Input-->

  <div class="form-group">
  <label class="col-md-4 control-label"> Health Status:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-list"></i></span>
  <select name="health" class="form-control selectpicker"> <option value="">Please Your Select Health Status</option>
  <option>Healthy</option>
  <option>Disabled</option>

  </select>
  </div> 
  </div>
  </div>


  <!--Text Input-->

  <div class="form-group">
  <label class="col-md-4 control-label"> CV:</label>
  <div class="col-md-6 inputGroupContainer">
  <input name="cv" type="file">
  </div>
  </div>
  <!--Text Input-->

  <div class="form-group">
  <label class="col-md-4 control-label"> Work Expriance:</label>
  <div class="col-md-6 inputGroupContainer">
  <input name="expriancefile" type="file">
  </div>
  </div>
  <!--Select basic-->

  <div class="form-group">
  <label class="col-md-4 control-label"> Educational Background:</label>
  <div class="col-md-6 inputGroupContainer">
  <input name="educationalfile" type="file">
  </div>
  </div>
  <div class="form-group">
  <label class="col-md-4 control-label"> Registration Date:</label>
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"><span class="input-group-addon"><i class="glyphicon-earphone"></i></span>
  <input name="rdate" class="form-control" type="text" value="<?php echo date("d/m/y "); ?> E.C" readonly>
  </div> 
  </div>
  </div>


  <?php
  }
  ?>

  </fieldset>

  <!--Button-->

  <div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
  <button type="submit" name="submit" class="btn btn-primary" style="width:400px; margin-left:0px;">Apply Now!
  </button>
  </div>
  </div>
  </fieldset>

  <?php
            if(isset($_POST["submit"]))
            {
              $fullname=$_POST["fullname"];
              $sex=$_POST["sex"];
              $phone=$_POST["phone"];
              $edulevel=$_POST["edulevel"];
              $workexp=$_POST["workexp"];
              $health=$_POST["health"];
              $jobtitle=$_POST["jobtitle"];
              $level=$_POST["level"];
              $orgname=$_POST["orgname"];
              $rdate=$_POST["rdate"];

            //Getting CV File's From Filed
              $cv=$_FILES['cv']['name'];
              $ptmploc=$_FILES["cv"]["tmp_name"];
              $pname=$_FILES["cv"]["name"];
              $psize=$_FILES["cv"]["size"];
              $ptype=$_FILES["cv"]["type"];

              //Getting File's From Filed
              
              $expriancefile=$_FILES['expriancefile']['name'];  
              $ptmploc1=$_FILES["expriancefile"]["tmp_name"];
              $pname1=$_FILES["expriancefile"]["name"];
              $psize=$_FILES["expriancefile"]["size"];
              $ptype=$_FILES["expriancefile"]["type"];
              
              //Getting File's From Filed
              $educationalfile=$_FILES['educationalfile']['name'];
              $ptmploc2=$_FILES["educationalfile"]["tmp_name"];
              $pname2=$_FILES["educationalfile"]["name"];
              $psize=$_FILES["educationalfile"]["size"];
              $ptype=$_FILES["educationalfile"]["type"];
              
              $edu=null;
              if($edulevel == 'Diploma')
                $edu=0;
              else if ($edulevel == 'Degree')
                $edu=1;
              else if ($edulevel == 'Masters')
                $edu=2;
              elseif ($edulevel == 'Phd') 
                $edu=3;

                if($con)
                { 

                if(!file_exists("App"))
                mkdir("App");
              if(!file_exists("App/$pname")){
                $photopath="App/$pname";
                $photopath1="App/$pname1";
                $photopath2="App/$pname2";

                if(copy($ptmploc,$photopath))
                  if(copy($ptmploc1,$photopath1))
                    if(copy($ptmploc2,$photopath2))
                {

                  $sql="INSERT into applicantdoc values(' ','$fullname','$sex','$phone','$edulevel','$edu',
                    '$workexp','$health','$photopath','$photopath1'
                    ,'$photopath2','$jobtitle','$level','$orgname','$rdate','Pending...','-','E3')" or die(mysqli_error($con));
                  $inserted=mysqli_query($con, $sql);
                  if($inserted){
                      echo "<script> alert('You Have Applyed successfully!') </script>";
                      echo "<script> window.open('post.php','_self') </script>";
                }
                  else  
                    echo "<script> alert('You Can Not Apply') </script> " or die(mysqli_error($con));
               }
             }
               else
                 {
                 echo "<script> alert('File Alrady Exists!  Change The File Name') </script>";
                echo "<script> window.open('post.php','_self') </script>";
                  }
           }
         }
  ?>

  </form>




  </div>
  </div><hr>

  <!-- Footer -->
      <footer>
        <div class="footer">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <ul class="list-inline text-center">
                <li class="list-inline-item">
                  <a href="#">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
              </ul>
              <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
            </div>
          </div>
        </div>
      </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
  </html> 