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

  <title>Apply Job</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/login.css">
  <link href="css/clean-blog.min.css" rel="stylesheet">

  <script>
var tim;
var min =1;
var sec =10;
function f1()
{
f2();
}
function f2() 
{
    if (parseInt(sec) > 0)
    {
    sec = parseInt(sec) - 1;
    document.getElementById("showtime").innerHTML ="Try Again in 0" + sec+" Seconds" ;
    tim = setTimeout("f2()", 1000);
    }
    else
     {
    if (parseInt(sec) == 0)
     {
    min = parseInt(min) - 1;
    
    if (parseInt(min) == 0) 
    {
    clearTimeout(tim);
    location.href ="login.php";
    
    }
    else
     {
    sec = 60;
    document.getElementById("showtime").innerHTML = min+" :" + sec;
    tim = setTimeout("f2()", 1000);
    }
    }
    }
}
</script> 
  
</head>
<body onload="f1()">
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

<div class="container con">
       
        <form class="form-signin" action="login.php" method="post"  enctype="multipart/form-data">
          <h1 class="text-center">Log in</h1>
          <p>
            <label class="sr-only">User Name:</label>
            <input type="text" name="username" readonly placeholder="Username" class="form-control" required autofocus>
          </p>
          <p>
            <label class="sr-only">Password:</label>
            <input type="password" name="password" readonly placeholder="password" class="form-control" required>
          </p>
          <p class="checkbox"><label><input type="checkbox">Remember me</label></p>

          <button type="submit" name="login" disabled class="btn btn-primary btn-block">Sign in</button></br>
          <a href=""><p><label>Forgot Password?</label></p></a>
<div id="showtime"></div>

          <?php

                  if(isset($_POST['login']))
                { 
                  $username=$_POST['username'];
                  $password=$_POST['password'];
                  $password=sha1($_POST['password']);
                  
                  if($con)
                  { 
                  //account
                    $sql="select * from account where username='$username' and password='$password'";
                    $matchfound=mysqli_query($con,$sql);
                if($row=mysqli_fetch_assoc($matchfound))
                { 
                    $id=$row["uid"];
                    $un=$row["username"];
                    $pw=$row["password"];
                    $role=$row["role"];
                    $status=$row["status"];

                  
                  //employee
  
                  $sqll="select * from employee where eid='$id'";
                  $matchfound1=mysqli_query($con,$sqll);
                  if($row=mysqli_fetch_assoc($matchfound1))
                  {
                  $eid=$row["eid"];
                  $fullname=$row["fullname"];
                  $sex=$row["sex"];
                  $phone=$row["phone"]; 
                  $workplace=$row["workplace"];
                  $position=$row["position"];
                  $photo=$row["photo"];
                  }
                    //session
                    $_SESSION['eid']=$eid;
                    $_SESSION['fullname']=$fullname;
                    $_SESSION['sex']=$sex;
                    $_SESSION['phone']=$phone;
                    $_SESSION['email']=$email;
                    $_SESSION['workplace']=$workplace;
                    $_SESSION['position']=$position;
                    $_SESSION['sun']=$un;
                    $_SESSION['spw']=$pw;
                    $_SESSION['srole']=$role;
                    $_SESSION['sphoto']=$photo;
                    

                      if($role=="Administrator" &&  $status=="Active")
                        header("location:dashboard.php");
                        
                      else if($role=="Employer" &&  $status=="Active")
                        header("location:registerjobdescription.php");
                        
                      else if($role=="Officer" &&  $status=="Active")
                        header("location:viewjobdesc.php");
                        
                      else if($role=="Head Of Civil Service" &&  $status=="Active")
                        header("location:head.php");
                        
                        
                      else
                      {
                        if($status=="inactive")
                        echo"Sorry Your Account Is Bolcked!!!";
                        else
                         echo "Invalid username/password";
                        header("location:Admin/login.php"); 
                      }
                    }
                  }
                  else

                    echo "Database not connected!";
                      $sql1=mysql_query("SELECT * FROM attempt");
                      $c=mysql_num_rows($sql1);
                      if($c>0)
                      $sql=mysql_query("DELETE FROM attempt");
                }
                  ?>




        </form>
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
            <p class="copyright text-muted">Copyright &copy; Debremarkos Civil Service Office 2018</p>
          </div>
        </div>
      </div>
    </footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html> 