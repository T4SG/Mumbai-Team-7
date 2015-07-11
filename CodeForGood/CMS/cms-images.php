<?php
	if(!isset($_POST['page'])){
		return "Invalid request!";
	}
	include("db_connect.php");
	include("display.php");
	$disp = new Display();
	if($_POST['page'] == "gallery"){
		$disp->displayTable("gallery");
	} else if($_POST['page'] == "bab"){
		$disp->displayTable("bab");
	} else if($_POST['page'] == "projects"){
		$disp->displayTable("project_images");
	}
?>