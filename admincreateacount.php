<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Create Account</title>

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
          <a href="dashboard.php">
          <span class="glyphicon glyphicon-th" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Dashboard</span>
          </a>
        </li>
        <li class="link active">
          <a href="index.html">
          <span class="glyphicon glyphicon-th" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Create Account</span>
          </a>
        </li>

        <li class="link">
          <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">Article</span>
            <span class="label label-success pull-right hidden-sm hidden-xs" >20</span>
          </a>
          <ul class="collapse collapseable" id="collapse-post">
            <li><a href="new-article.html">Create New</a></li>
            <li><a href="articles.html">View Article</a></li>
          </ul>
        </li>

        <li class="link">
          <a href="#collapse-comments" data-toggle="collapse" aria-controls="collapse-comments">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">Comments</span>
           
          </a>
          <ul class="collapse collapseable" id="collapse-comments">
            <li><a href="approved.html">Approved</a></li>
            <span class="label label-success pull-right hidden-sm hidden-xs" >10</span>

            <li><a href="unapproved.html">Unapproved</a></li>
            <span class="label label-warning pull-right hidden-sm hidden-xs" >20</span>
          </ul>
        </li>

        <li class="link">
          <a href="commenters.html">
          <span class="glyphicon glyphicon-user" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Commenters</span>
          </a>
        </li>

        <li class="link">
          <a href="tags.html">
          <span class="glyphicon glyphicon-tags" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Tags</span>
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
          <li id="wellcome" class="hidden-xs">welcome to your Admin page</li>

          <li>
          <a href="#" class="logout">
          <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
          Logout
          </a>
          </li>
        </ul>
      </div>

      <!-- -->


    </header>
  </div>

       <div class="container">
    <form action="Admincreateacount.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <h4>Register Employees</h4>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="firstname" placeholder="First Name"/ required>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="lastname"placeholder="Last Name"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="sex" placeholder="Sex"/>
          <div class="input-icon"><i class="fa fa-key"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="phone" placeholder="Phone"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="email" name="email" placeholder="Email"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="username" placeholder="Username"/>
          <div class="input-icon"><i class="fa fa-key"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="password" name="password" placeholder="Password"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span>
            <select name="role"> 
            <option value="">Select role</option>
            <option>Administrator</option>
            <option>Head Of Civil Service</option>
            <option>Employer</option>
            <option>Officer</option>
            </select>
        </div> 
        </div>
        </div>
        <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Register"/>
          <div class="input-icon"></div>
        </div>

        
        
        
      </div>
      
    </form>
    </div>
  <br>
  
<?php
    $con=mysqli_connect("localhost","root","","job");
    if(isset($_POST["submit"]))
    {
      $firstname=$_POST["firstname"];
      $lastname=$_POST["lastname"];
      $sex=$_POST["sex"];
      $phone=$_POST["phone"];
      $email=$_POST["email"];
      $username=$_POST["username"];
      $role=$_POST["role"];
      $password=$_POST["password"];

      if($con)
      {
        $sql="select * from employee where username='$username'";
        $userexist=mysqli_query($con,$sql);
        $c=mysqli_num_rows($userexist);
        if($c>='1')
          echo "Username already exist please change your username and try again!";
        else{
          $sql="insert into employee values(' ','$firstname','$lastname','$sex','$phone','$email','$username','$role','$password')";
          $inserted=mysqli_query($con,$sql);
          if($inserted)
            echo "User registered successfully!";
          else  
            echo "Unable to register the user";
        }
      }else
        echo "Connection Failed";
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
</body>
</html>

