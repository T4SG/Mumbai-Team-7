<?php

class Display {
	function displayTable($tableName){
		include("db_connect.php");
	  	echo "<div style='background:rgba(0, 0, 0, 0.15);black; '>";
		echo "<div style='clear:both;'></div></div>";
		
		echo "<div>";
		echo '<div style="background-color:rgba(255,255,255,0.5);border:10px solid white;width:500px;height:600px;padding:50px;">';
		echo "<form action='upload.php' method='post' enctype='multipart/form-data'>";
		if($tableName != 'project_images'){
			echo "Upload Image:<br/><br/> ";
			echo "<input type='file' name='uploaded_image' /><br/><br/>";
			echo "<input type='text' name='caption' placeholder='Enter Image Caption' /><br/><br/>";
		}
		 else if($tableName == 'project_images') {
			echo "Upload Image:(Max 5)<br/> ";
			echo "<input type='file' name='uploaded_image[]' /><br/><br/>";
			echo "<input type='file' name='uploaded_image[]' /><br/><br/>";
			echo "<input type='file' name='uploaded_image[]' /><br/><br/>";
			echo "<input type='file' name='uploaded_image[]' /><br/><br/>";
			echo "<input type='file' name='uploaded_image[]' /><br/><br/>";
			
			echo "<input type='text' name='caption' placeholder='Enter Image Caption' /><br/>";
			echo "<input type='text' name='name' placeholder='Enter Story Name' /><br/>";
			echo "<textarea name='description' rows='10' cols='40' style='resize:none;' placeholder='Enter Description' />";
		} else if($tableName == 'gallery'){
			echo "<input type='text' name='caption' placeholder='Enter Image Caption' />";
		}
		echo "<input type='hidden' name='table' value='$tableName'><br/>";
		echo "<input type='submit' name='submit' value='Upload' />";
		echo "</form>";
		echo "</div>";
		
		}
		
	}
	
   
		
?>