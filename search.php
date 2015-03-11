<?php 
  include_once("loggedin.php");
  include_once('settings.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Forms Example</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	function handrolled(){
		var nameSearchJs = document.getElementById('nameSearch').value;
		
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState==4){
				document.getElementById("resultshere").innerHTML= xhr.responseText;
			}
		}
		xhr.open('GET', 'searchresults.php?nameSearch=' + nameSearchJs, true);
		xhr.send(null);
   }
   
   function jqueryroller(){
      $.ajax({
      	type: 'GET',
      	url: 'searchresults.php',
      	data: { nameSearch: $("#nameSearch").val()},
      	dataType: 'text',
      	success: function(data){
      		$('#resultshere').html(data);
      	}
      });
   }   		
</script>

</head>

<body>
  <div class="container_12"> 
    <h2>Goal: Fetch and display some data from the dataset provided.</h2>    
    <form id="form1" name="form1" method="get" action="searchresults.php">
      <label>Name:
        <input type="text" name="nameSearch" id="nameSearch" value="" />
      </label>
      <label>
        <input type="submit" name="Search" id="Search" value="search" />
        
      </label>
      <input type="button" value="JS Search" onclick="handrolled();" />
      <input type="button" value="JQuery" id="mybutton" onclick="jqueryroller();">
    </form>
  </div> 
    <div id="resultshere" ></div>
</body>
</html>

