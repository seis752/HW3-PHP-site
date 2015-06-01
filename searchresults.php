<?php
  include_once('config.php');
?>
<ol>
  <?php       
    $name = $_GET['nameSearch'];
    $result = mysqli_query($db,"SELECT * FROM users where name like '%$name%' limit 20");
    while($row = mysqli_fetch_array($result))
    {
      echo '<li>'.$row['name'] . " - " . $row['username'];
      echo "</li>";
    }     

?>
</ol>

