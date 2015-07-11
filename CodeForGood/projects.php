<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
		include('db_connect.php');
		$pid=1;
		$count=0;
		
		$sql="Select count(*) from project";
		$max = $con -> query($sql) or die("Error:".$sql);
		while($row2 = $max->fetch_array())
		{							
			$abc=$row2[0];
		}
			//echo $pid;
?>
<html>
    <head>
        <title>Stories</title>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=1150">
        
        <link rel="stylesheet" type="text/css" href="css/projects/projectscss.css"/>
        <!--Start, Santosh style -->
        <link rel="stylesheet" type="text/css" href="css/header_footer/style1.css" />
        <!--End, Santosh style -->
        
        <!--start, slider
        	<link rel="stylesheet" href="css/projects/jquery.sliderTabs.css">
        -->
		<script src="js/jquery-2.1.1.min.js"></script>
        <!--
        	<script src="js/jquery.sliderTabs.js"></script>
    	end, slider -->
        
        <!--  Load the stylesheets for image slider  -->
    	<link rel="stylesheet" href="css/projects/slider/default.css" type="text/css" media="screen" />
    	<link rel="stylesheet" href="css/projects/slider/nivo-slider.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="css/projects/slider/style.css" type="text/css" media="screen" />
        
        <style type="text/css">
			.demoPanel{
			padding: 0;
			background-color: #222;
			text-align: center;
			}
			.demoPanel img{
			width: 100%;
			}
			.ui-slider-tabs-indicator-container{
			background-color: rgba(34, 34, 34, 0.32);
			}
		</style>
        
        <script>
		$(document).ready(function() {
         
		
		
		 
            $.ajax({

                type: "GET",
                url: "php/project/proj1.php",
                data: 'q=1',
                success: function(msg){
				//console.log(msg);
                    $('#from_ajax_with_json').append(msg);
					
					//console.log(i);
                }

            }); // Ajax Call
      
		
		
    }); //document.ready
	var i=1;
var count=6;
var main=1
var n=0;
   
	 $(document).ready(function() {
        $('#right-arrow').click(function(){
		
		 i++;
		 var a=(i%3);
		 var b=(i+1)%3;
		 var c=(i+2)%3;
		// var d=(i+3)%4;
		 if(a==0)
		 {
			a=3;
			 
		 }
		 else if(b==0)
		 {
			 b=3;
		 }
		 else if(c==0)
		 {
			 c=3;
		 }
            $.ajax({

                type: "GET",
                url: "php/project/proj.php",
                data: 'q=' + i,
				dataType : 'json',
                success: function(msg){
                    $('#a_1').html(msg['ajax2']);
					$('#a_2').html(msg['ajax4']);
					$('#a_3').html(msg['ajax6']);
					$('#p_1').attr('href','projects.php?pid='+msg['ajax1']+'');
					$('#p_2').attr('href','projects.php?pid='+msg['ajax3']+'');
					$('#p_3').attr('href','projects.php?pid='+msg['ajax5']+'');
					$('#b_1').attr('class','circletag2_slider'+a+'');
					$('#b_2').attr('class','circletag2_slider'+b+'');
					$('#b_3').attr('class','circletag2_slider'+c+'');
                }

            }); // Ajax Call
      
		}); //event handler
    }); //document.ready
	$(document).ready(function() {
        $('#left-arrow').click(function(){
	
		i--;
		var a=(i%3);
		 var b=(i+1)%3;
		 var c=(i+2)%3;
		// var d=(i+3)%4;
		 if(a==0)
		 {
			a=3;
			 
		 }
		 else if(b==0)
		 {
			 b=3;
		 }
		 else if(c==0)
		 {
			 c=3;
		 }
		if(i==0)
		{
			i=<?php echo $abc;?>
		}		
		
            $.ajax({

                type: "GET",
                url: "php/project/proj.php",
                data: 'q=' + i,
				dataType : 'json',
                 success: function(msg){
                    $('#a_1').html(msg['ajax2']);
					$('#a_2').html(msg['ajax4']);
					$('#a_3').html(msg['ajax6']);
					
					$('#p_1').attr('href','projects.php?pid='+msg['ajax1']+'');
					$('#p_2').attr('href','projects.php?pid='+msg['ajax3']+'');
					$('#p_3').attr('href','projects.php?pid='+msg['ajax5']+'');
					$('#b_1').attr('class','circletag2_slider'+a+'');
					$('#b_2').attr('class','circletag2_slider'+b+'');
					$('#b_3').attr('class','circletag2_slider'+c+'');
					//console.log(i);
					
					if(i==1||i==0)
					{
						i=msg['ajax'];
						i++;
					}
					
                }

            }); // Ajax Call
       
		}); //event handler
    }); //document.ready
	
		</script>
        
    </head>
    <body>
		<?php
        	include("header.php");
		?> 
        <div class="background">

            <div class="structure">
                


                <div class="content">
                    <div class="projectHead">Latest Stories</div>
                    <div class="slider" style="width:981px;height:161px;border:0px solid;">
					<div class="left-arrow" id="left-arrow" style="float:left;margin-left:225px;margin-top:62px;"><img src="assets/home_projects/arrow-left2.png"></div>
						<div class="names" style="width:351px;height:160px;margin-left:25px;margin-right:25px;border:0px solid;float:left;">
							<div class="from_ajax_with_json" id="from_ajax_with_json" >
							
							</div>
						</div>
					<div class="right-arrow" id="right-arrow"  style="float:left;margin-top:62px;">
						<img src="assets/home_projects/arrow-right2.png">
					</div>
					</div>
                    <div class="projectDesc">
					<div id="wrapper" class="profilePicture">
                        <!-- The slider wrapper div  -->
                        <?php
							if($pid==3)
							{
						?>
								<div class="slider-wrapper theme-default" style="max-height: 315px;">
						<?php
							}
							else
							{
						?>
								<div class="slider-wrapper theme-default">
						<?php
							}
						?>
						
                            <div id="slider" class="nivoSlider" style="min-height: 300px; max-height: 400px;">
                        <?php
                            //$pid=$_GET['pid'];
                            $title1="Select * from project_images where p_id=".$pid ;
                            $res1 = $con -> query($title1) or die("Error:".$title1);
                            while($row1 = $res1->fetch_assoc())
                            {
                                $imageUrl=$row1['image'];
                                $imageUrl = str_replace(":","-",$imageUrl);
                                //echo '<li><a href="#'.$imageUrl.'"></a></li>';
                            
                                //  Images to slide through.
                                echo '<img src="CMS/uploads/'.$imageUrl.'" alt="" style="-webkit-box-shadow: 0px 1px 5px 0px #4a4a4a; -moz-box-shadow: 0px 1px 5px 0px #4a4a4a; box-shadow: 0px 1px 5px 0px #4a4a4a;" />';
                            }
                        ?>
                               
                            </div>
                            
                          
                            
                        </div>
                
                	</div>
					<?php $title="Select * from project where p_id=".$pid ;
						$res = $con -> query($title) or die("Error:".$title);
      					while($row = $res->fetch_assoc())
						{
							
				
							
							echo '<div class="contentRight">
								
							
							
								<div class="hello" id="projectTitle">'.$row["name"].'</div>
								</div>
								<p class="helloContent" style="line-height: 1.5em;">'.$row["description"].'</p>';
						}
					?>
					<?php 
						
							
                        
						?>
                    <!--</div>                   -->
                    <div style="clear:both">
                    </div>
                            
                    </div>



                </div>
            </div>
			
        </div>
        <?php
        	include("footer.php");
		?>
       
                
        <!--  Load the javascript files  -->
		<script type="text/javascript" src="js/project_slider/jquery.nivo.slider.js"></script>
        <script type="text/javascript">
        
			//<!--  Load the slider  --> 
			$(window).load(function() {
				$('#slider').nivoSlider();
				//imageSlider.reload();
			});
        
	    </script>  
    </body>
</html>
