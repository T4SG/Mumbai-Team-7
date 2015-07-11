<?php
	include("db_connect.php");
	$name = $_GET['name'];
	$tableName;
  	$referHash;
	switch ($_GET['t']) {
    case 'g':
        $tableName='gallery';
        $referHash='#Gallery';
		$id_attr = 'g_id';
        break;
    case 'p':
        $tableName='project_images';
        $referHash = '#Projects';
		$id_attr = 'p_id';
        break;
    case 'b':
        $tableName='bab';
        $referHash = '#Bab';
		$id_attr = 'b_id';
        break;
    default:
    	echo ("Error deleting $file");
  	
}
	$temp = str_replace(":","-",$name);
  try{
      unlink("uploads/".$temp);
  } catch(Exception $e){
    echo ("May not be able to delete file: ". $e->getMessage() ."\n");
  }
  
  $query = "Select * from $tableName where image='$name'";
  $res = $con->query($query) or die("Error:".$query);
  while($row = $res->fetch_array(MYSQL_NUM))
  {
	  $id = $row[0];
  }
  echo "id: ".$id."<br/>";
  $query = "Delete from $tableName where image='$name'";
  if($tableName=='project_images')
  {
	  $query1 = "Select p_id from $tableName where image='$name'";
	  $res1 = $con->query($query1);
	  $row1 = $res1->fetch_assoc();
	  $pid_proj = $row1['p_id'];
  }
  $con->query($query) or die("Error:".$query);
  //var_dump($id_attr); echo "<br/>";
  if ($tableName != 'project_images')
  {
	  $query = "UPDATE $tableName SET $id_attr=$id_attr-1 WHERE $id_attr>$id";
	  var_dump($query); echo "<br/>";
	  $con->query($query) or die("Error:".$query);
  }
  
  if ($tableName == 'project_images')
  {
	  //delete all images from uploads folder
	  $query = "Select image from project_images where p_id='$pid_proj'";
	  $res = $con -> query($query) or die("Error:".$query);
      while($row = $res->fetch_assoc()){
		$temp = str_replace(":","-",$row['image']); //: replaced by -
		try{
		  unlink("uploads/".$temp);
		} catch(Exception $e){
			echo ("May not be able to delete file: ". $e->getMessage() ."\n");
		}
	  }
	  
	  $query = "Delete from project_images where p_id='$pid_proj'";
	  $con->query($query) or die("Error:".$query);
	  
	  $query = "Delete from project where p_id='$pid_proj'";
	  $con->query($query) or die("Error:".$query);
	  
	  $query = "UPDATE project SET p_id=p_id-1 WHERE p_id>$id";
	  $con->query($query) or die("Error:".$query);
	  
	  //Since cascade updates have been disabled the following lines of code are required
	  $query = "UPDATE project_images SET p_id=p_id-1 WHERE p_id>$id";
	  $con->query($query) or die("Error:".$query);
  }

  /*
  if($tableName == 'project_images'){
      $query = "Delete from project where p_id = '$con->deleteId()'";
      $con->query($query) or die("Error:".$query);
  }
  */
  //echo "$query";


	if(strpos($_SERVER['HTTP_REFERER'],'?')) {
		$redirect_url = substr($_SERVER['HTTP_REFERER'],0,strpos($_SERVER['HTTP_REFERER'],'?'));
	    //echo 'redirect_url_1: '.$redirect_url.'<br/>';
	}
	else {
		/*
			echo "server: ".$_SERVER['HTTP_REFERER'].'<br/>';
			echo "strpos: ".strpos($_SERVER['HTTP_REFERER'],'?').'<br/>';
			echo "substr: ".substr($_SERVER['HTTP_REFERER'],0,strpos($_SERVER['HTTP_REFERER'],'?')).'<br/>';
		*/
		$redirect_url = $_SERVER['HTTP_REFERER'];
		//echo 'redirect_url: '.$redirect_url.'<br/>';
	}
	header("Location: ".$redirect_url."?delete=success".$referHash);	
?>