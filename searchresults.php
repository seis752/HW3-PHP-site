<?php
  include_once("loggedin.php");
  include_once('settings.php');
?>
<ol>
  <?php       
    $name = $_GET['nameSearch'];
    $result = mysql_query("SELECT * FROM users where name like '%$name%' limit 20");
    while($row = mysql_fetch_array($result))
    {
      echo '<li>'.$row['name'] . " - " . $row['username'];
      echo "</li>";
    }     
    mysql_close($con);
?>
</ol>
<?php include_once('close.php'); ?>
