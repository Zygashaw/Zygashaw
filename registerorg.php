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
  $eid=$_SESSION['eid'];
  $name=$_SESSION['sun'];
?>
  <div class="container-fluid display-table">
    <div class="row display-table-row"> 

    <!--side menu-->

      <div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
        <h1 class="hidden-xs hidden-sm">Job Tracking</h1>

     <li class="link ">
          <a href="dashboard.php">
          <span class="glyphicon glyphicon-th" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Dashboard</span>
          </a>
        </li>

        <li class="link active">
          <a href="registerorg.php">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">Register Org And Level</span>
          </a>
        </li>
        <li class="link ">
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
                $sql="select * from employee";
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
          <span class="label label-success pull-right hidden-sm hidden-xs" >20</span>
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
          <a href="adminsetting.php">
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
        <ul class="pull-right" style=" margin-right:45px; ">
          <li id="wellcome" class="hidden-xs">welcome to your Admistrator page</li>
          

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
    <form action="registerorg.php" method="post"  enctype="multipart/form-data">
      <div class="row">
        <h4>Register Organizations</h4>


            <?php
          if(isset($_POST["submit1"]))
          {
            
            $orgname=$_POST["orgname"];
            $orgregdate=$_POST["orgregdate"];

            $sql="SELECT * from organization where orgname='$orgname'";
            $exist=mysqli_query($con,$sql);

              if(mysqli_num_rows($exist)>0)
              {
            ?>
              <div class="panel-body" style="">
              <div class="alert alert-danger">
                 Organization Alredy Exist!!    
              </div>
              </div>
            <?php
            } 

            else
            {
                $sql="INSERT INTO organization VALUES(' ','$orgname','$orgregdate','$eid')";
                $inserted=mysqli_query($con, $sql);
                if($inserted)
                    {
                  ?>
                  <div class="panel-body">
              <div class="alert alert-success" style="">
                 Organization Registered Successfully!!    
              </div>
              </div>
                      
                  <?php
                   } 
                else 
                { 
                  ?>

                  <div class="panel-body" style="">
              <div class="alert alert-warning">
                 Organization Not Registered!!    
              </div>
              </div>
                  <?php } } }?>
        
        
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="orgname" placeholder="Organization Name" />
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="orgregdate" readonly value="<?php echo date("d/m/y"); ?> E.C" placeholder="Organization Registration Date" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        
        
        <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit1" class="btn btn-primary" value="Register"/>
          <div class="input-icon"></div>
        </div>
        
      </div>

      <div class="row">
        <h4>Register Level</h4>

        <?php
          if(isset($_POST["submit2"]))
          {
            
            $leveltype=$_POST["leveltype"];
            $levelregdate=$_POST["levelregdate"];

            $sql2="SELECT * from level where level_type='$leveltype'";
            $exist=mysqli_query($con,$sql2);

              if(mysqli_num_rows($exist)>0)
              {
            ?>
              <div class="panel-body" style="width:417px; margin-left:50px;">
              <div class="alert alert-danger">
                 Level Alredy Exist!!    
              </div>
              </div>
            <?php
            } 

            else
            {
                $sql="INSERT INTO level VALUES(' ','$leveltype','$levelregdate','$eid')";
                $inserted=mysqli_query($con, $sql);
                if($inserted)
                    {
                  ?>
                  <div class="panel-body">
              <div class="alert alert-success" style="width:417px; margin-left:50px;">
                 Level Registered Successfully!!    
              </div>
              </div>
                      
                  <?php
                   } 
                else 
                { 
                  ?>

                  <div class="panel-body" style="width:417px; margin-left:50px;">
              <div class="alert alert-warning">
                 Level Not Registered!!    
              </div>
              </div>
                  <?php } } }?>
        
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="leveltype" placeholder="Level Name" />
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="levelregdate" readonly value="<?php echo date("d/m/y"); ?> E.C" placeholder="Organization Registration Date" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        
        
        <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit2" class="btn btn-primary" value="Register"/>
          <div class="input-icon"></div>
        </div>
        
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