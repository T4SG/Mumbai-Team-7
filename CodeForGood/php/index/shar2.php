<?php
	include("../../db_connect.php");
	$count=0;
	
	$sql="Select count(*) from project";
	$max = $con -> query($sql) or die("Error:".$sql);
	while($row2 = $max->fetch_array())
	{							
		$abc=$row2[0];
	}
	$advert = array(
       'ajax' => $abc, 
     );
	 $xa=1;
	if(!$_GET['q'])
	$i=1;
	else
	$i=$_GET['q'];
	$i=$i%$abc;
	$k=$i;
	
	for($j=1;$j<=3;$j++)
	{
		if($i>$abc)
		{
			$i=1;
		}
									
		if($i==0)
		{
			$i=$abc;
		}
		
		$sql="select * from project where p_id='".$i."'";
		$res = $con -> query($sql) or die("Error:".$sql);
		while(($row = $res->fetch_assoc()) &&($count<3))
		{
			$count++;
			$advert['ajax'.$xa.'']= $row['p_id'];
			$xa++;
			$advert['ajax'.$xa.'']= $row['name'];
			$xa++;
		}
		$i++;
		
	}
	echo json_encode($advert);
?>



