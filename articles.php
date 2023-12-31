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

	        <li class="link active">
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
	<!--content-->
	 <div id="content">
	   <header class="clearfix">
	     <h2 class="page_title pull-left">Allarticle</h2>
	     <button type="button" class="btn btn-xs btn-primary pull-right">Create new article</button>
	   </header>
	   <div class="content-inner">
	     <div class="row search-row">
	     <div class="col-md-12">
	     <div class="input-group">
	     	<input type="text"class="form-control search-field" id="search" placeholder="Search">
	     	<span class="input-group-btn">
	     		<button type="button" class="btn btn-primary go">Go!</button>
	     	</span>
	     </div>
	     </div>
	    </div>

	    <div class="row article-row">
	    	<div class="col-md-1 col-xs-2 col-sm-1 status-padding">
	    		<span class="label label-success label-sm">Active</span>
	    	</div>
	    	<div class="col-md-8 col-xs-10 col-sm-6 article-title">
	    		<p>Build responsive, mobile-first projects on the web with the world's most popular front-end component library.</p>
	    		<small>Created 10th March 2018</small>
	    	</div>
	    	<div class="col-xs-10 col-sm-5 col-md-3 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
	    		<div class="article-actions">
	    			<a class="btn btn-xs btn-default" href="#" role="button">
	    				<span class="glyphicon glyphicon-folder-open" aria-hidden="true">&nbsp;View</span>
	    			</a>
	    			<a class="btn btn-xs btn-default" href="#" role="button">
	    				<span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp;Edit</span>
	    			</a>
	    			<a class="btn btn-xs btn-default" href="#" role="button">
	    				<span class="glyphicon glyphicon-remove" aria-hidden="true">&nbsp;Delete</span>
	    			</a>
	    		</div>
	    	</div>
	    </div>

	    <hr>

	    <div class="row">
	    	<div class="col-md-12">
	    		<nav>
	    			<ul class="pagination">
	    				<li><a href="#">&laquo;</a></li>
	    				<li><a href="#">1</a></li>
	    				<li><a href="#">2</a></li>
	    				<li><a href="#">3</a></li>
	    				<li><a href="#">4</a></li>
	    				<li><a href="#">5</a></li>
	    				<li><a href="#">&raquo;</a></li>
	    			</ul>
	    		</nav>
	    	</div>
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