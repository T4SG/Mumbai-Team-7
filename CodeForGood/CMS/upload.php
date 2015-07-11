<?php
include ("db_connect.php");
include ('SimpleImage.php');
$image = new SimpleImage();
$uploadSuccess = false;
//0 indicates success
$referHash;
$tableName = $_POST['table'];

//required for upload
$search_for1 = "'";
$search_for2 = '"';
$replace_with1 = "\'";
$replace_with2 = '\"';

if ($tableName == 'project_images') {

	$query = "Select COUNT(*) as img_count from $tableName";
	$res = $con -> query($query);
	$row = $res -> fetch_assoc();

	if (0) {
		//$uploadSuccess = false;
	} else {
		$referHash = '#Projects';
		//to find max id
		$query_proj = "Select MAX(p_id) as max_pid from project";
		$res_proj = $con -> query($query_proj);
		$row_proj = $res_proj -> fetch_assoc();
		$pid_proj = $row_proj['max_pid'] + 1;
		$name = $_POST['name'];
		$description = $_POST['description'];
		
		
		$description = str_replace($search_for1,$replace_with1,$description);
		$description = str_replace($search_for2,$replace_with2,$description);
		
		$query = "INSERT INTO project(p_id, name, description) VALUES ('$pid_proj', '$name', '$description')";
		$con -> query($query);

		$target_path = "./uploads/";
		// Declaring Path for uploaded images.
		for ($i = 0; $i < count($_FILES['uploaded_image']['name']); $i++) {
			// Loop to get individual element from the array
			$validextensions = array("jpeg", "jpg", "png", "gif", "JPG");
			// Extensions which are allowed.
			$ext = explode('.', basename($_FILES['uploaded_image']['name'][$i]));
			// Explode file name from dot(.)
			$file_extension = end($ext);
			// Store extensions in the variable.

			if (in_array($file_extension, $validextensions)) {
				$image -> load($_FILES['uploaded_image']['tmp_name'][$i]);
				$image -> resizeToWidth(300);
				$target_fileName = $pid_proj . "-" . $i . "-" . $_FILES['uploaded_image']['name'][$i];
				$query = "INSERT INTO project_images(p_id, image) VALUES ('$pid_proj', '$target_fileName')";
				$con -> query($query);
				$target_path = $target_path . $target_fileName;
				// Set the target path with a new name of image.
				if ($image -> save($target_fileName)) {
					// If file moved to uploads folder.
					$uploadSuccess = true;
				} else {
					$uploadSuccess = false;
				}
			} else {//   If File Size And File Type Was Incorrect.
				$uploadSuccess = false;
			}
		}
	}

} else {
	//Tried allowing .JPG by the code below, which echos lol but the same aint working in the actual if.. Please check it
	$f_type = pathinfo($_FILES['uploaded_image']['name'],PATHINFO_EXTENSION);;
	echo $f_type;
	if($f_type == 'JPG')
	echo "lol"; 
	/*if (($_FILES['uploaded_image']['tmp_name'] != "") && (($_FILES['uploaded_image']['type'] == "image/*") || ($f_type == 'JPG')))//if the upload type is correct or upload file is selected
	{*/
	echo "<br/>"; var_dump($_FILES['uploaded_image']['tmp_name']);
	if (($_FILES['uploaded_image']['tmp_name'] != ""))
	{
		if((($_FILES['uploaded_image']['type'] == "image/gif") || ($_FILES['uploaded_image']['type'] == "image/jpeg") || ($_FILES['uploaded_image']['type'] == "image/jpg") || ($_FILES['uploaded_image']['type'] == "image/png") || ($f_type == 'JPG')))//if the upload type is correct or upload file is selected
		{
			echo "correct type<br/>";
			$image -> load($_FILES['uploaded_image']['tmp_name']);
			if ($tableName == 'gallery') {
				$image -> resizeToWidth(600);
			} else {
				$image -> resizeToWidth(300);
			}

			$query = "Select COUNT(*) as img_count from $tableName";
			$res = $con -> query($query);
			$row = $res -> fetch_assoc();

			if ($row['img_count'] <= 19) {
				$fn = $_FILES['uploaded_image']['name'];
				$caption = $_POST['caption'];
				
				$caption = str_replace($search_for1,$replace_with1,$caption);
				$caption = str_replace($search_for2,$replace_with2,$caption);
				
				$query;

				if ($tableName == 'bab') {
					$referHash = '#Bab';
					//to find max id
					$query_bab = "Select MAX(b_id) as max_bid from bab";
					$res_bab = $con -> query($query_bab);
					$row_bab = $res_bab -> fetch_assoc();
					$pid_bab = $row_bab['max_bid'] + 1;

					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$description = $_POST['description'];
					
					$description = str_replace($search_for1,$replace_with1,$description);
					$description = str_replace($search_for2,$replace_with2,$description);
					
					$query = "INSERT INTO bab(b_id, fname, lname, caption, description, image) VALUES ('$pid_bab', '$fname', '$lname', '$caption', '$description', '$fn')";
				} else if ($tableName == 'gallery') {
					$referHash = '#Gallery';
					//to find max id
					$query_gallery = "Select MAX(g_id) as max_gid from gallery";
					$res_gallery = $con -> query($query_gallery);
					$row_gallery = $res_gallery -> fetch_assoc();
					$pid_gallery = $row_gallery['max_gid'] + 1;

					$query = "INSERT INTO $tableName(g_id, name, image) VALUES ('$pid_gallery', '$caption', '$fn')";
				} else if ($tableName == 'project_images') {

				}

			}
			if ($tableName != 'project_images') {
				$con -> query($query) or die("Error: " . $query);

				$query = "Select MAX(timestamp) as m_ts from $tableName";
				$res = $con -> query($query) or die($query);
				$row = $res -> fetch_assoc();
				$max_ts = $row["m_ts"];
				$final_file_name = $max_ts . '_' . $fn;

				$query = "UPDATE $tableName SET image='$final_file_name' WHERE timestamp='$max_ts'";
				$con -> query($query) or die($query);

				$final_file_name = str_replace(":", "-", $final_file_name);
				//: replaced by -

				if ($image -> save($final_file_name))//if the upload is successful
				{
					echo "Success<br/>";
					$uploadSuccess = true;
				} else//if the upload fails
				{
					echo "Fail<br/>";
					$uploadSuccess = false;
					/*if(strpos($_SERVER['HTTP_REFERER'],'?') !== false)
					 {
					 $redirect_url = substr($_SERVER['HTTP_REFERER'],0,strpos($_SERVER['HTTP_REFERER'],'?'));
					 header("Location: ".$redirect_url."?upload=fail");
					 }
					 else
					 {
					 header("Location: ".$_SERVER['HTTP_REFERER']."?upload=fail");
					 }*/
				}
			}
		} else//if the upload type is incorrect or no upload file is selected
		{
			echo "incorrect type<br/>";
			$uploadSuccess = false;
			/*if(strpos($_SERVER['HTTP_REFERER'],'?') !== false)
			 {
			 $redirect_url = substr($_SERVER['HTTP_REFERER'],0,strpos($_SERVER['HTTP_REFERER'],'?'));
			 header("Location: ".$redirect_url."?upload=fail");
			 }
			 else
			 {
			 header("Location: ".$_SERVER['HTTP_REFERER']."?upload=fail");
			 }*/
		}
	}
	else
	{
		echo "<br/>no name";
	}
}

//0 indicates success



if ($uploadSuccess) {
	if (strpos($_SERVER['HTTP_REFERER'], '?') !== false) {
		$redirect_url = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '?'));
		header("Location: " . $redirect_url . "?upload=success" . $referHash);
	} else {
		header("Location: " . $_SERVER['HTTP_REFERER'] . "?upload=success" . $referHash);
	}

} else {

	if (strpos($_SERVER['HTTP_REFERER'], '?') !== false) {
		$redirect_url = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '?'));
		header("Location: " . $redirect_url . "?upload=fail" . $referHash);
	} else {
		header("Location: " . $_SERVER['HTTP_REFERER'] . "?upload=fail" . $referHash);
	}
}

?>