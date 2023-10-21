<!DOCTYPE html>
<html lang="en">
  <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin</title>
  
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="chosen_v1.8.3/chosen.jquery.min.css">
  <link rel="stylesheet" type="text/css" href="summernote-master/dist/summernote.css">
  <link rel="stylesheet" href="css/default.css">
  <link rel="stylesheet" href="css/new-article.css">
</head>
<body>
<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

		<div class="col-md-2 col-sm-1 hidden-xs display-table-cell " id="side-menu">
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
   <header>
     <h2 class="page_title">Create new article</h2>
   </header>
   <div class="content-inner">
     <div class="form-wrapper">
       <form>
         <div class="form-group">
           <label class="sr-only">Title</label>
           <input type="text" class="form-control" id="title" placeholder="title">
         </div>

         <div class="form-group">
           <label class="sr-only">tags</label>
           <select data-placeholder="Select tags" multiple name="tags" class="form-control chosen-select">
             <option></option>
             <option>html</option>
             <option>css</option>
             <option>coding</option>
             <option>php</option>
           </select>
         </div>

         <div class="form-group">
           <label class="sr-only">Article</label>
           <textarea class="form-control summernote" placeholder="Article" name="article"></textarea>
         </div>
         <div class="checkbox">
         <label>
           <input type="checkbox">publish article when i click on save
         </label>
           <div class="clearfix">
           <button type="submit" class="btn btn-primary pull-right">Publish</button>
             
           </div>
         </div>
       </form>
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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/default.js"></script>
<script src="chosen_v1.8.3/chosen.jquery.min.js"></script>
<script src="summernote-master/dist/summernote.min.js"></script>
<script type="text/javascript">
  
  var config = {
    '.chosen-select': {},
    '.chosen-select-deselect': {allow_single_deselect:true},
    '.chosen-select-no-single': {disable_search_threshold:10},
    '.chosen-select-no-result':{no_results_text: 'Oops, noting found!'},
    '.chosen-select-width': {width:"95%"}
  }
  for (var selector in config){
    $(selector).chosen(config[selector]);
  }
</script>

<script type="text/javascript">
  $('.summernote').summernote({
    height:200
  })
</script>
</body>
</html> 