<?php 
  include_once('settings.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Forms Example</title>
</head>

<body>
  <div class="container_12"> 
    <h2>Goal: Fetch and display some data from the dataset provided.</h2>    
    <form id="form1" name="form1" method="get" action="searchresults.php">
      <label>Name:
        <input type="text" name="nameSearch" id="nameSearch" value="<?php echo $name ?>" />
      </label>
      <label>
        <input type="submit" name="Search" id="Search" value="search" />
      </label>
    </form>
  </div> 
    <div id="resultshere" ></div>
</body>
</html>
<?php include_once('close.php'); ?>
