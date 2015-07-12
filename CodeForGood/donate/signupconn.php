
<html>
  
    <body>
       
        <?php
      // include './connection.php';
         $conn=  mysql_connect("localhost","","");
        mysql_select_db('test');
        
        
   $name= filter_input(INPUT_POST, 'email');
          $pass= filter_input(INPUT_POST, 'pass');
      // $name=$_POST('n1');
      // $pass=$_POST('n2');
      
 
      if(! $conn)
           {   echo "could not connect ";
           }      
          
 else{
     mysql_query("INSERT INTO testdb (username,password) VALUES ('$name','$pass')");
     header("location: ../charity2.php");
 }
           
   
        ?>
    </body>
</html>
