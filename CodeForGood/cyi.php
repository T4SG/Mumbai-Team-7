<!DOCTYPE html>
<html>
  <head>
	<script>
	
	function myfunc()
	{
	
	var a=document.getElementById("z").value;
	
	if(a<10 && a>0)
	{
		document.body.style.backgroundImage = "url('images/10d2.jpg')";
		document.getElementById("txt").innerHTML="Even a smallest comtribution has an impact on the redevelopment of a school.We assure that your money  will help a kid in his education and serve its purpose. ";
   	 	}

		if(a<=50 && a>10)
	{
		document.body.style.backgroundImage = "url('images/50d2.jpg')";
		document.getElementById("txt").innerHTML="A proper shelter structure with sufficient air and light is a must for any school.happy hearts fund steps up to achieve this feat long after first responders leave.";
	}
	if(a<=100 && a>50)
	{
		document.body.style.backgroundImage = "url('images/300d2.jpg')";
		document.getElementById("txt").innerHTML="With every dollar spent is used to make available little things that make a school.";
	}
	if(a<=200 && a>100)
	{
		document.body.style.backgroundImage = "url('images/200d2.jpg')";
	  document.getElementById("txt").innerHTML="Even if it is no longer in news problem of education persists, so funds are required for students with talent and a whole mass of students to help them out of the emotional trauma. ";
	} 
	if(a<=400 && a>200)
	{
		document.body.style.backgroundImage = "url('images/500d.jpg')";
    	document.getElementById("txt").innerHTML="For construction of a single school it can take upto 5 years, which unfortunately is mostly due to lack of funding .In such cases often an entire generation of kids is no longer able to participate in schools and recieve education.";
		}
	if(a>400)
	{
		document.body.style.backgroundImage = "url('images/1000t.jpg')";
		document.getElementById("txt").innerHTML=" At happy heart funds we believe to engage potential donors in focussing on long term relief. We appeal to all our donors -Give smart,Give sustainability";
	}
	
	}
	
</script>
	<style>
p{font-family:Open Sans; background-color:FF99FF;color:coral;font-size:14;}
b{font-family:sans-serif;color:coral;background-color:FFCCFF;color:white;font-size:16;}
i{font-family:Copperplate Gothic Bold;color:blue;background-color:FFCCFF;color:blue;font-size:10;}
.container{width:100%;height:100%;}
.center{width:40%;height:450px;margin:auto;background-color:rgba(255,255,255,0.5);border:10px solid white;padding:20px;}
.txt{padding:50px;width:100%;height:60px; font-size:30;}
</style>
    <meta charset="utf-8">
    <title>My test page</title>
	<link rel="stylesheet" type="text/css" href="css/header_footer/style1.css" />
	<link rel="stylesheet" href="css/projects/slider/style.css" type="text/css" media="screen" />
  </head>
  <body style="background: rgba(0, 0, 0, 0.5);">
  <div style="width:100%;height:100%;">
  <?php
        	include("header.php");
		?> 
		</div>
 <b> <h1>"What happens when I donate??"</h1></b>  <br>
 <hr color="red">
	<p>
	<div class="container">
	<div class="center">
   <a href="#" id="ea">Enter a value to see how you can do your bit towards community...  </a>
	 <input id="z" type="integer" name="amt"><br />
<button type="button" onclick="myfunc()" width=48 height=48>Calculate your Impact! </button> <br> <br> <br>
<div id="txt"></div>
</div>
</div>
	</p>

    <!--<img src="images/firefox-icon.png" alt="The Firefox logo: a flaming fox surrounding the Earth.">-->

   <!--<a href="#" id="ea">Enter amount </a>-->
	<?php
        	include("footer.php");
		?> 
 
  </body>
</html>