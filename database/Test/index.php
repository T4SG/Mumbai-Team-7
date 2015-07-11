<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <body>
        <?php
              $conn = mysql_connect("localhost","","");// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
 else {
   echo "connected";    
} 
mysql_select_db('test');
        ?>
    </body>
</html>
