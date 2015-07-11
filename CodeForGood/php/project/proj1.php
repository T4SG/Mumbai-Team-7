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
			echo '<a  id="p_'.$j.'" href="projects.php?pid='.$row['p_id'].'"><div class="abc " style="float:left;"><div class="circletag2_slider'.$j.'" id="b_'.$j.'" style="line-height=100px;vertical-align: middle;color:#606060;align:middle;"><div  class="circletext2" id="a_'.$j.'">'.$row['name'].'</div></div></div></a>';
			
		}
		$i++;
		
	}
	
?>