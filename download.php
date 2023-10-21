<!-- Download Cv -->
					<?php

		            if (isset($_GET["cid"]))
		              {
		              $filename=basename($_GET["cid"]);
		              $file='App Document/'.$filename;
		              if(!empty($filename) && file_exists($file)){
		              	//Define Headers
		              	header("Cache-controle: public");
		              	header("Content-Description: File Transfer");
		              	header("Content-Disposition: attachment; filename=$filename");
		              	header("Content-Type: application");
		              	header("Content-Transfer-Encoding: binary");
		              	//read the file
		              	readfile($file);
		              	exit;
		              }
		          }
		              ?>