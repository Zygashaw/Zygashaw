<!DOCTYPE html>
<?php
session_start();
include("includes/dbcon.php");

?>
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
        <li class="link">
          <a href="createaccount.php">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">Create Account</span>
          </a>
        </li>

        <li class="link">
          <a href="viewemployee.php">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">View Employees</span>
            <span class="label label-success pull-right hidden-sm hidden-xs" >20</span>
          </a>
        </li>

        <li class="link">
          <a href="comments.php">
          <span class="glyphicon glyphicon-user" aria-hidden></span>
          <span class="hidden-sm hidden-xs">View Comments</span>
          <span class="label label-success pull-right hidden-sm hidden-xs" >20</span>
          </a>
        </li>

        <li class="link active">
          <a href="backup.php">
          <span class="glyphicon glyphicon-tags" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Take Backup</span>
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
        <li id="wellcome" class="hidden-xs">welcome to your administration area</li>

        <li>
        <a href="login.php" class="logout">
        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
        Logout
        </a>
        </li>
      </ul>
    </div>
  </header>
</div>

<div class="container">
    <form>
      <div class="row">
        <h4>Restore Page</h4>

        <div class="input-group " style="margin-left:150px;">
            <a href="#" role="button">
              <input type="submit" name="submit" class="btn btn-xs btn-primary" value="RESTORE"/></a>
        </div>

        <?php
        
       function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
  {
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
 
} 

       $domain="localhost";
      $dbuser="root";
      $dbpass="";
      $dbname="job";
       $x=0;
      mysqli_connect($domain,$dbuser,$dbpass) or die(mysqli_error());
      if(mysqli_select_db($con,$dbname))
      $x=1;
      else
      $x=2;
      if($x==2)
      {
        
      mysqli_query($con,"create database ExitExam") or die(mysqli_error());
          echo "<br>Your Database is Successfully created";
      }else if($x==1)

      { 
      $filePath  = 'D:/Backup/job.sql';
      $restore=restoreDatabaseTables($domain, $dbuser, $dbpass, $dbname, $filePath);
      if($restore)
      {
       echo"<br>Database Is Successfully Is Restore";
        $activity="Admin restore database from  path= $filePath";
      }
       else
       echo"<br>Database Is not Successfully Is Restore".mysqli_error($con);
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
</body>
</html>