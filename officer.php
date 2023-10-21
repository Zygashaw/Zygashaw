<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Appliccant</title>

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

      <div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
        <h1 class="hidden-xs hidden-sm">Job Tracking</h1>
        <ul>
        <li class="link active">
            <a href="requestapplicant.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Request Applicant</span>
            </a>
          </li>
               <li class="link ">
            <a href="viewjobdes.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Job Description</span>
            </a>
          </li>
          <li class="link ">
            <a href="viewhiredempployee.php">
            <span class="glyphicon glyphicon-tags" aria-hidden></span>
            <span class="hidden-sm hidden-xs">View Hired Employee</span>
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
          <li id="wellcome" class="hidden-xs">welcome to your Employer page</li>
          <li class="fixed-width">
          <a href="#">
          <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
          <span class="label label-warning">3</span>
          </a>
          </li>

          <li class="fixed-width">
          <a href="#">
          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          <span class="label label-message">3</span>
          </a>
          </li>

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
    <form>
      <div class="row">
        <h4>Request Applicant</h4>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" placeholder="Work Place Organaization"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" placeholder="Work Field Name"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
       
       <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
        <select name="aa"> 
            <option>select...</option>
            <option>Full Time</option>
            <option>Contract</option>
            <option>Afar</option>
            <option>Debub</option>
         </select>
         <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>

        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
        <select name="aa"> 
            <option>Hiring type...</option>
            <option>Internal Transfer</option>
            <option>External Transfer</option>
            <option>Hiring</option>
            <option>Level edget</option>
         </select>
         <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>

        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <textarea type="textarea" value="Educational Experience Subject"> </textarea>
          

        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="password" placeholder="Work starting Date"/>
          <div class="input-icon"><i class="fa fa-key"></i></div>
        </div>
        <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" placeholder="Vaccancy Asked By"/>
          <div class="input-icon"><i class="fa fa-key"></i></div>
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
</body>
</html>