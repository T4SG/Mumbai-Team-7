
<html>
    
    <body>
        <?php
      //include 'includes/index.php';
      $conn = mysql_connect("localhost","","");
      mysql_select_db('test');
      $query="select * from test";
      $result=mysql_query($query);
      while($row=  mysql_fetch_array($result))
      {
          echo  $row['name']. " - ". $row['email']. " - ". $row['password']. " - ". $row['phone'];
      }
      ?>
    </body>
</html>
