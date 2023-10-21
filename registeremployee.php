<?php
session_start();
include("includes/dbcon.php");

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
			<h1 class="hidden-xs hidden-sm">Navigation</h1>
      <ul>
        <li class="link ">
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
        <li class="link active">
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
          <a href="viewemployee.php">
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
      <ul class="pull-right" style=" margin-right:65px; ">
          <li id="wellcome" class="hidden-xs">welcome to your Admistrator page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i> <?php echo $name; ?> <b class="caret"></b>
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
    <form action="registeremployee.php" method="POST"  enctype="multipart/form-data">
      <div class="row">
        <h4>Register Employees Information</h4><p style="color:red;">*All Fileds Are Required !</p>
      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="eid"  placeholder="Employee Id" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="fullname"  placeholder="Full Name" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
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
          <input type="text" name="phone" pattern="[0-9+ ]+" maxlength="13" minlength="13" value="+251 " placeholder="" required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="email" placeholder="Email" required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <select name="workplace">
          <option>Select Work place</option>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        
           <?php 

            $get_org = "SELECT * FROM organization";
            $run_org = mysqli_query($con, $get_org);
            while ($row_org=mysqli_fetch_array($run_org)) {
              $org=$row_org['orgname'];

              echo "<option>$org</option>";
            }

            ?>
            
        </select>
        </div>
          <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="position" placeholder="Job Position" required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>

         <div class="input-group " style="width:1000px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Register Now!" required/>
          <div class="input-icon"></div>
        </div>
      </div>

      <!-- Account Information -->
      <div class="row pull-right" style="margin-top:-560px; margin-left:-60px;">
        <h4>Account Information</h4><p style="color:red;">*All Fileds Are Required !</p>
      
      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="username"  placeholder="User Name" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="password" name="password" placeholder="Password" required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <select name="role">
            <option>Select Role</option>
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
            <option>Administrator</option>
            <option>Head Of Civil Service</option>
            <option>Employer</option>
            <option>Officer</option>
          </select>
          </div>

        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="file" name="photo" placeholder="Photo" required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
    </form>
    </div>
</div>

<?php
        if(isset($_POST["submit"]))
        {
          $eid=$_POST["eid"];
          $fullname=$_POST["fullname"];
          $sex=$_POST["sex"];
          $phone=$_POST["phone"];
          $email=$_POST["email"];
          $workplace=$_POST["workplace"];
          $position=$_POST["position"];

        //Getting CV File's From Filed
          $photo=$_FILES['photo']['name'];
          $ptmploc=$_FILES["photo"]["tmp_name"];
          $pname=$_FILES["photo"]["name"];
          $psize=$_FILES["photo"]["size"];
          $ptype=$_FILES["photo"]["type"];

          //Account

          $username=$_POST["username"];
          $password=sha1($_POST["password"]);
          $role=$_POST["role"];


          if($con){

            if(!file_exists("Photo"))
              mkdir("Photo");
            if(!file_exists("Photo/$pname")){
              $photopath="Photo/$pname";

              if(copy($ptmploc,$photopath))
              {

              $sql2="SELECT * FROM account WHERE username='$username' ";
              $exist=mysqli_query($con,$sql2);

              if(mysqli_num_rows($exist)>0)
              {
                echo "User Name Already Exists";
              }
              else
              {

              $sql="INSERT INTO employee VALUES('$eid','$fullname','$sex','$phone','$email','$workplace','$position','$photo')";
              $inserted=mysqli_query($con, $sql);

              $sql1="INSERT INTO account VALUES('$eid','$username','$password','$role','Active')";
              $inserted1=mysqli_query($con, $sql1);
              if($inserted1)
                 {

                 echo "<script> alert('Employee registered successfully!') </script>" ;
                 echo "<script> window.open('registeremployee.php','_self') </script>" ;

                 }
              else  
                  echo "Unable to Register".mysqli_error($con);
            }          
          }
        }
        else{
          echo "<script> alert('Photo Already Exists!') </script>" ;
          echo "<script> window.open('registeremployee.php','_self') </script>" ;
        }
      }
      else
        echo "No Connection".mysqli_error($con);
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