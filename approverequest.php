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
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
	      <ul>
	        <li class="link ">
	          <a href="registerjobdescription.php">
	          <span class="glyphicon glyphicon-th" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">Register Job Description</span>
	          </a>
	        </li>

	        <li class="link ">
	          <a href="viewjobdescription.php">
	          <span class="glyphicon glyphicon-tags" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">View Job Description</span>
	          </a>
	        </li>

	        <li class="link ">
            <a href="registerlevel.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Level Type</span>
            </a>
          </li>

	        <li class="link ">
            <a href="registercat.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register catagory</span>
            </a>
          </li>

          <li class="link ">
            <a href="registerorg.php">
            <span class="glyphicon glyphicon-th" aria-hidden></span>
            <span class="hidden-sm hidden-xs">Register Organization</span>
            </a>
          </li>

	        <li class="link ">
	          <a href="viewrequestedapplicant.php">
	          <span class="glyphicon glyphicon-user" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">View Requested App</span>
	          </a>
	        </li>

	        <li class="link ">
	          <a href="postvacancy.php">
	          <span class="glyphicon glyphicon-tags" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">Post Vacancy</span>
	          </a>
	        </li>

	         <li class="link ">
	          <a href="viewjobseekerdoc.php">
	          <span class="glyphicon glyphicon-tags" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">View Job Seeker Doc</span>
	          </a>
	        </li>

	        <li class="link active">
	          <a href="registerapplicant.php">
	          <span class="glyphicon glyphicon-tags" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">Register Applicants</span>
	          </a>

	          <li class="link ">
	          <a href="registerapplicantsresult.php">
	          <span class="glyphicon glyphicon-tags" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">Register Apps Result</span>
	          </a>
	        </li>

               <li class="link ">
	          <a href="viewapplicantsresult.php">
	          <span class="glyphicon glyphicon-tags" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">View Applicants Result</span>
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
	      <h4>RegisterJob Applicant Result</h4>
	       <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" placeholder="ID"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" placeholder="Organaization Name"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" placeholder="Job Title"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" placeholder="Test Date"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	     
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" placeholder="Full Name"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="email" placeholder="For Girls Only (3%)"/>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="password" placeholder="Test (90%)"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" placeholder="Interview (10%)"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="email" placeholder="Total"/>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="password" placeholder="Selected or Not"/>
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