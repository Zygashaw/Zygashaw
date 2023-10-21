
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
	  <form action="registerapplicant.php" method="post"  enctype="multipart/form-data">
	    <div class="row">

	      <h4>Register Applicant</h4>

	      <?php 
            if (isset($_GET["vid"]))
              {
              $vid=$_GET["vid"];
              $_SESSION['vid']=$vid;
              $get_job = "select * from postvacany where vid='$vid' ";
              $run_job = mysqli_query($con, $get_job);

              while ($row_job=mysqli_fetch_array($run_job)) 
              {
              $vid=$row_job['vid']; 
              $jobtitle=$row_job['jobtitle']; 
              $joblevel=$row_job['leveltype'];
              $organname=$row_job['organaization_name']; 
              }
            ?>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="title" value="<?php echo "$jobtitle"; ?>" readonly/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="org" value="<?php echo "$organname"; ?>" readonly/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div class="form-group">

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="level" value="<?php echo "$joblevel"; ?>" readonly/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>
	      <?php } ?>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="fullname" placeholder="Full Name" autofocus/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <select name="sex">
            <option>Select Sex</option>
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
            <option>Male</option>
            <option>Female</option>
          </select>
          </div>

          <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="phone" pattern="[0-9+ ]+" maxlength="13" minlength="13" value="+251 " placeholder="Phone" />
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="edulevel" placeholder="Educationa Level"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="workexp" placeholder="Work Experiance(Years)"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div class="form-group">

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <select name="health">
            <option>Select Health Status</option>
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
            <option>Healthy</option>
            <option>Disabled</option>
          </select>
          </div>

	      <label style="margin-left:42px;">* Applicant CV:</label>
	      <div  style="width:417px; margin-left:42px;">
	        <input type="file" name="cv"/>	        
	      </div>
	      <label style="margin-left:42px;">* Applicant Work Experiance:</label>
	      <div  style="width:417px; margin-left:42px;">
	        <input type="file" name="expriancefile"/>	        
	      </div>
	      <label style="margin-left:42px;">* Applicant Educational Background:</label>
	      <div  style="width:417px; margin-left:42px;">
	        <input type="file" name="educationalfile"/>
	        
	      </div>
	      </br>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="rdate" value="<?php echo date("d/m/y"); ?> E.C" readonly/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>


	       <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Request Now!"/>
          <div class="input-icon"></div>
        </div>
      </div>
	     
     <?php
          if(isset($_POST["submit"]))
          {
          	$title=$_POST['title'];
            $level=$_POST['level'];
            $org=$_POST["org"];
            $fullname=$_POST["fullname"];
            $sex=$_POST["sex"];

            $phone=$_POST["phone"];
            $edulevel=$_POST["edulevel"];
            $workexp=$_POST["workexp"];
            $health=$_POST["health"];
            $rdate=$_POST["rdate"];

          //Getting File's From Filed
            $cv=$_FILES['cv']['name'];
            $ptmploc=$_FILES["cv"]["tmp_name"];
            $pname=$_FILES["cv"]["name"];
            $psize=$_FILES["cv"]["size"];
            $ptype=$_FILES["cv"]["type"];
            
            $expriancefile=$_FILES['expriancefile']['name'];  
            $ptmploc1=$_FILES["expriancefile"]["tmp_name"];
            $pname1=$_FILES["expriancefile"]["name"];
            $psize=$_FILES["expriancefile"]["size"];
            $ptype=$_FILES["expriancefile"]["type"];
            
            $educationalfile=$_FILES['educationalfile']['name'];
            $ptmploc2=$_FILES["educationalfile"]["tmp_name"];
            $pname2=$_FILES["educationalfile"]["name"];
            $psize=$_FILES["educationalfile"]["size"];
            $ptype=$_FILES["educationalfile"]["type"];
            
              $edu=null;
              if($edulevel == 'TVET')
                $edu=0;
              else if ($edulevel == 'Diploma')
                $edu=1;
              else if ($edulevel == 'Deegree')
                $edu=2;
              elseif ($edulevel == 'Masters') 
                $edu=3;
              elseif ($edulevel == 'Phd')
              	$edu=4;
              
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

                $sql="INSERT INTO applicantdoc VALUES(' ','$fullname','$sex','$phone','$edulevel','$edu',
                  '$workexp','$health','$photopath','$photopath1','$photopath2','$title','$level','$org','$rdate','Pending...','-','E3')";
                $inserted=mysqli_query($con, $sql);
                if($inserted){
                  echo "<script> alert('You Have Applyed successfully!') </script>";
                  echo "<script> window.open('viewpostedvacancy.php','_self') </script>";
              }
                else  
                  echo "<script> alert('You Can Not Apply') </script> ".mysqli_error($con);
                  echo "<script> window.open('viewpostedvacancy.php','_self') </script>";
           } 
       }else  
            echo "<script> alert('File Name Exists Change The Name!') </script> ".mysqli_error($con);
            echo "<script> window.open('viewpostedvacancy.php','_self') </script>";
      }
   }      
	?>
	      
	    </div>
	    
	  </form>

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