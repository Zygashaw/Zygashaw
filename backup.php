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
			<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
      <ul>
        <li class="link active">
          <a href="dashboard.php">
          <span class="glyphicon glyphicon-th" aria-hidden></span>
          <span class="hidden-sm hidden-xs">Dashboard</span>
          </a>
        </li>

        <li class="link ">
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
                $sql="SELECT * from employee";
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
          <?php
                $sql="SELECT * from employee";
                $query = mysqli_query($con,$sql);
                $coun = mysqli_num_rows($query);
            ?>
            <span class="label label-success pull-right hidden-sm hidden-xs" ><?php echo $coun?></span>
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
        <h4>Backup Page</h4>
        
       <!--Backup -->
       <script type = "text/javascript" >
                    function preventBack()
                    {
                    window.history.forward();
                    } 
                    setTimeout("preventBack()", 0); 
                    window.onunload=function(){null};
                    </script>
                    <?php
                    $tables = array();
            $query = mysqli_query($con, 'SHOW TABLES');
            while($row = mysqli_fetch_row($query))
            {
            $tables[] = $row[0];
            }
            $result ="";
            foreach($tables as $table)
            {
            $query = mysqli_query($con, 'SELECT * FROM '.$table);
            $num_fields = mysqli_num_fields($query);

            $result .= 'DROP TABLE IF EXISTS '.$table.';';
            $row2 = mysqli_fetch_row(mysqli_query($con, 'SHOW CREATE TABLE '.$table));
            $result .= "\n\n".$row2[1].";\n\n";
            for ($i = 0; $i < $num_fields; $i++)
            {
            while($row = mysqli_fetch_row($query))
            {
            $result .= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++)
            {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = str_replace("\n","\\n",$row[$j]);
            if(isset($row[$j]))
            {
            $result .= '"'.$row[$j].'"' ; 
            }
            else
            { 
            $result .= '""';
            }
            if($j<($num_fields-1))
            { 
            $result .= ',';
            }
            }
            $result .= ");\n";
            }
            }
            $result .="\n\n";
            }
            //Create Folder
            $folder = 'D:/Backup/';
            if (!is_dir($folder))
            mkdir($folder, 0777, true);
            chmod($folder, 0777);

            //$date = date('d'); 
            $filename = $folder."job"; 

            $handle = fopen($filename.'.sql','w+');
            fwrite($handle,$result);
            fclose($handle);
            ?>
            <?php
            ;
            echo "<tr style='background-color: #cc2ee2;'><td>".$filename."</td></tr>";
            echo "<div class='success'>
              Backup successfully...</div>".mysqli_error($con)
                     ?>   


        <!--End of bakup-->
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