<html>
   <body>
       
        <?php
      include('db_connect.php');
        
        
   $name= filter_input(INPUT_POST, 'email');
          $pass= filter_input(INPUT_POST, 'pass');

     $sql="select image from gallery where Approved=0";
	$res = $con -> query($query) or die("Error:".$query);
      	while($row = $res->fetch_assoc()){
        	$temp = str_replace(":","-",$row['image']); //: replaced by -
        	$db_img_name = "uploads/".$temp; 
		?>
			<div class='display-image'>
				<?php echo $row['image']; ?>&t=<?php echo gallery[0]; ?>" > <img src="<?php echo $db_img_name; ?>" width="200px" height="200px" name="<?php echo $row['image']; ?>";
				
			</div>

          
    </body>
</html>