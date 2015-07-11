<?php
	include("../../db_connect.php");
	$count=0;
							
	$sql="Select count(*) from project";
	$max = $con -> query($sql) or die("Error:".$sql);
	while($row2 = $max->fetch_array())
	{
		$abc=$row2[0];
		//echo '<a href="projects.php?pid='.$row['p_id'].'"><div class="circle"><p class="circletext">'.$row['name'].'</p></div></a>';
	}
														
	//while($row2 = mysql_fetch_array($max, MYSQL_NUM))
	$advert = array(
       'ajax' => $abc, 
     );
	if(!$_GET['q'])
	$i=1;
	else
	$i=$_GET['q'];
	$i=$i%$abc;
	$k=$i;
	//var_dump( $i);
	for($k=1;$k<=3;$k++)
    {	
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
		
		$sql1="select * from project where p_id='".$i."'";
		$res1 = $con -> query($sql1) or die("Error:".$sql);
			
		while(($row1 = $res1->fetch_assoc()) &&($count<3))
		{							
			$count++;
			
			echo '<a  id="p_'.$j.'" href="projects.php?pid='.$row1['p_id'].'"><div id="b_'.$j.'" class="circle'.$j.' " style="float:left;"><div class="circletext" id="a_'.$j.'" >'.$row1['name'].'</div></div></a>';
		}
		$i++;
	}
	}
?>