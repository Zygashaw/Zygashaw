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
    <link rel="stylesheet" href="css/dataTables.min.css">
  
</head>
<body>
<div class="container-fluid display-table">
		<div class="row display-table-row">

		<!--side menu-->

		<div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
			<h1 class="hidden-xs hidden-sm">Navigation</h1>
      <ul>
        <li class="link active">
          <a href="index.html">
          <span class="glyphicon glyphicon-th" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Approve Employee</span>
          </a>
        </li>

        <li class="link">
          <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">Approve Request</span>
          </a>
        </li>

        <li class="link">
          <a href="#collapse-comments" data-toggle="collapse" aria-controls="collapse-comments">
            <span class="glyphicon glyphicon-" aria-hidden="true"></span>
            <span class="hidden-sm hidden-xs">Approve Hired Employee</span>
           
          </a>
        </li>

        <li class="link">
          <a href="commenters.html">
          <span class="glyphicon glyphicon-user" aria-hidden></span>
          <span class="hidden-sm hidden-xs">View Comments</span>
          </a>
        </li>

        <li class="link">
          <a href="tags.html">
          <span class="glyphicon glyphicon-tags" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Tags</span>
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
        <a href="#" class="logout">
        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
        Logout
        </a>
        </li>
      </ul>
    </div>
  </header>
</div>

 <div class="container sol">
      <h4>Job Description</h4>
      <table class="table table-stried table-border table-hover">
        <thead>
          <tr>
            <th>Jobseeker Fullname</th>
            <th>Sex</th>
            <th>Phone</th>
            <th>Jobseeker CV</th>
            <th>Work Experiance</th>
            <th>Educational Background</th>
            <th>Job Title</th>
            <th>Level</th>
            <th>Organization Name</th>
            <th>Registration Date</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Jobseeker Fullname</th>
            <th>Sex</th>
            <th>Phone</th>
            <th>Jobseeker CV</th>
            <th>Work Experiance</th>
            <th>Educational Background</th>
            <th>Job Title</th>
            <th>level</th>
            <th>Organization Name</th>
            <th>Registration Date</th>
          </tr>
          
        </tfoot>
        <tbody>

        <tr>
          <td>
          <a class="label btn btn-xs label-message" href="registerapplicant.php?" role="button">
              <span class="glyphicon " aria-hidden="true">&nbsp;Request</span>
            </a>
          </td>
        </tr>

          </tbody>
      </table>

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