<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Articles</title>

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" type="text/css" href="css/articles.css">
		<link rel="stylesheet" type="text/css" href="css/tags.css">

	</head>
	<body>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
				<h1 class="hidden-xs hidden-sm">Navigation</h1>
	      <ul>
	        <li class="link ">
	          <a href="index.html">
	          <span class="glyphicon glyphicon-th" aria-hidden></span>
	          <span class="hidden-sm hidden-xs">Dashboard</span>
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

	        <li class="link active">
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

	<div class="row">
		<div class="col-md-4 dashboard-left-cell">
			<div class="admin-content-con">
				<header>
					<h5>Create tags</h5>
				</header>
				<form>
					<div class="form-group">
						<label>Add comma separeted tags below</label>
						<p>
							<textarea class="form-control" rows="3" placeholder="e.g coding, css, python"></textarea>
							<p>
								<button type="button" class="btn btn-large btn-block btn-primary">Save Tags</button>
							</p>
						</p>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-8 dashboard-right-cell">
		<div class="admin-content-con">
			<header>
				<h5>Tags</h5>
			</header>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Status</th>
						<th>Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>python</td>
						<td><span class="label label-success">in use</span></td>
						<td>2 days ago</td>
						<td>
						<button type="button" class="btn btn-warning">edit</button>
						<button type="button" class="btn btn-danger disabled">delete</button>
						</td>
					</tr>
					<tr>
						<td>php</td>
						<td><span class="label label-success">not use</span></td>
						<td>4 days ago</td>
						<td>
						<button type="button" class="btn btn-warning">edit</button>
						<button type="button" class="btn btn-danger disabled">delete</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
			
		</div>
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

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>