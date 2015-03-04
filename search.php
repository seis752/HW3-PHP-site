<?php
  include_once('settings.php');
?>

<script>
function loadSearchResultsAjax()
{
var ajax = new XMLHttpRequest();
ajax.onreadystatechange=function()
  {
  if (ajax.readyState==4)
    {
    document.getElementById("resultshere").innerHTML=ajax.responseText;
    }
  }
ajax.open("GET","searchresults.php?nameSearch="+nameSearch2.value,false);
ajax.send();
}

function loadSearchResultsJQuery()
{
$.ajax({
  url: "searchresults.php",
  cache: false,
  data: { nameSearch: nameSearch3.value }
})
  .done(function( html ) {
    //$( "#results" ).append( html );
    document.getElementById("resultshere").innerHTML=html;
  });
}

</script>

<!DOCTYPE html>
<html>
<head>
<title>Forms Example</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
    </form>

    <br>

    <h2>Goal: Fetch and display some data from the dataset provided (Ajax).</h2>
	<form id="form2" name="form2" method="get" action="searchresults.php()">
	      <label>Name:
	        <input type="text" name="nameSearch2" id="nameSearch2" value="" />
	      </label>
	      <label>
	        <button type="button" onclick="loadSearchResultsAjax()">Search</button>
	      </label>
    </form>

    <br>

    <h2>Goal: Fetch and display some data from the dataset provided (JQuery).</h2>
	<form id="form3" name="form3" method="get" action="searchresults.php">
	      <label>Name:
	        <input type="text" name="nameSearch3" id="nameSearch3" value="" />
	      </label>
	      <label>
	        <button type="button" onclick="loadSearchResultsJQuery()">Search</button>
	      </label>
    </form>

    <br>

  </div>
    <div id="resultshere" ></div>
</body>
</html>
<?php include_once('close.php'); ?>
