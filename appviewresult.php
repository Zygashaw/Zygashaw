<?php
include("includes/dbcon.php");

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this home page -->
    <link href="css/homepage.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">JOB TRACKING</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="appviewresult.php">View Result</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/  .jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row" style="margin-top:80px;">
          <!-- <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Find Job</h1>
              <span class="subheading">Debremarkos NO 1 Job Site!</span>
            </div>
          </div> -->
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 ">
          <div class="post-preview">

        <form>

        <!-- Applicant Approved or rejected table -->
             <h4>Applicants Selected For Test Or Not</h4> 
             <span class="pull-right" style="margin-left:500px; margin-top:-17px;"><?php echo date("m/d/y");?></span>
          <table class="table table-stried table-border table-hover">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Sex</th>
                  <th>Organization Name</th>
                  <th>Job Title</th>
                  <th>Result</th>
                </tr>
              </thead>
              <tbody>

                <?php
              if($con)
              {

                $sql="SELECT * from applicantdoc ORDER BY orgname";
                  $userexist=mysqli_query($con,$sql);
                  $c=mysqli_num_rows($userexist);
                  if($c >= '1')
                  {
                while($row = mysqli_fetch_assoc($userexist)){

                      $status=$row['status'];
                      if ($status!='Pending...'){
                ?>

              <tr>

                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['orgname']; ?></td>
                <td><?php echo $row['jobtitle']; ?></td> 
                <td><?php echo $row['status']; ?></td>
              </tr>
            <?php
          }
                }
              }
            }
            ?>
                </tbody>
                


            </table>


            <div class="row" >
              <h4>Applicant TEST Result </h4> <span class="pull-left" style="margin-left:350px;"><?php echo date("m/d/y");?></span>
               <table class="table table-stried table-border table-hover">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Sex</th>
                  <th>Organization Name</th>
                  <th>Job Title</th>
                  <th>Test(90%)</th>
                  <th>Inteview(10%)</th>
                  <th>Total</th>
                  <th>Result</th>
                  <th>Final Result</th>
                </tr>
              </thead>
              <tbody>

                <?php
              if($con)
              {

                $sql="SELECT * from applicantresult WHERE practical=' ' AND test2=' '";
                  $userexist=mysqli_query($con,$sql);
                  $c=mysqli_num_rows($userexist);
                  if($c >= '1')
                  {
                while($row = mysqli_fetch_assoc($userexist)){
                      $test2=$row['test2'];
                      $practical=$row['practical'];
                      if ($test2=' ' && $practical=' '){
            ?>

              <tr>

                <td><?php echo $row['afullname']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['organaization_name']; ?></td>
                <td><?php echo $row['vacancy_title']; ?></td> 
                <td><?php echo $row['test']; ?></td>
                <td><?php echo $row['interview']; ?></td>
                <td><?php echo $row['total_grade']; ?></td>
                <td><?php echo $row['status']; ?></td>  
                <td><?php echo $row['status2']; ?></td>
              </tr>
            <?php
          }
                }
              }
            }
            ?>
                </tbody>
                


            </table><br>
            <hr>


            <!-- Applicant Practical Result table -->
             <h4>Applicant PRACTICAL Result </h4> 
             <span class="pull-left" style="margin-left:200px;"><?php echo date("m/d/y");?></span>
          <table class="table table-stried table-border table-hover">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Sex</th>
                  <th>Organization Name</th>
                  <th>Job Title</th>
                  <th>Practical(75%)</th>
                  <th>Test(15%)</th>
                  <th>Inteview(10%)</th>
                  <th>Total</th>
                  <th>Result</th>
                  <th>Final Result</th>
                </tr>
              </thead>
              <tbody>

                <?php
              if($con)
              {

                $sql="SELECT * from applicantresult";
                  $userexist=mysqli_query($con,$sql);
                  $c=mysqli_num_rows($userexist);
                  if($c >= '1')
                  {
                while($row = mysqli_fetch_assoc($userexist)){
                  // $interview=$row['interview'];
                  $test2=$row['test2'];
                  $practical=$row['practical'];
                  if ($test2>0 && $practical>0){
                ?>

              <tr>

                <td><?php echo $row['afullname']; ?></td>
                <td><?php echo $row['sex']; ?></td>
                <td><?php echo $row['organaization_name']; ?></td>
                <td><?php echo $row['vacancy_title']; ?></td> 
                <td><?php echo $row['practical']; ?></td>
                <td><?php echo $row['test2']; ?></td>
                <td><?php echo $row['interview']; ?></td>
                <td><?php echo $row['total_grade']; ?></td>
                <td><?php echo $row['status']; ?></td>
                
                <td><?php echo $row['status2']; ?></td>

                <!-- <td>
                <a class="label btn btn-xs label-message" href=".php? docid=<?php echo $row['aid'];?>" role="button">
                    <span class="glyphicon " aria-hidden="true">Edit</span>
                  </a>
                </td><td>
                <a class="label btn btn-xs label-message" href="registerapplicantsresult.php? docid=<?php echo $row['aid'];?>" role="button">
                    <span class="glyphicon " aria-hidden="true">Post</span>
                  </a>
                </td> -->
              </tr>
            <?php
          }
                }
              }
            }
            ?>
                </tbody>
                


            </table>
              
            </div>
      
    </form>




          </div>
          </div></div></div>
          

    <hr>

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

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/homepage.min.js"></script>

  </body>

</html>
