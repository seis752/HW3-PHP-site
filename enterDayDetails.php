<!doctype html>

<head>
  <!--  <script src="jquery.js"></script>  -->
    <script type="text/javascript" language="javascript" >  //
    function addtext() { 
        //www.mediacollege.com/internet/javascript/form/add-text.html
        //var newtext = "some newtext";     // works 
        //var newtext = document.myform.morningActivity.value; // does NOT work 
        //var newtext = document.textContent.toString(); // does NOT work 
        //alert( newtext);    // works 
        document.myform.morningActivity.value = "try this"; // does NOT work 
        //document.myform.morningActivity.value = newtext; // does NOT work 
        //enterDayDetails.myform.morningActivity.value = newtext; // does NOT work 
        //document.forms['myform'].elements['morningActivity'].value = newtext;   // does NOT work 
    }
    </script>
</head>

<body>
   <h3> Use this form to enter/edit information for the selected day.  </h3> <br> <br>
    <form name="myForm" id="myForm">  
        StartingLocation: <input id="startingLocation" name="startingLocation" size="15" type="text" />  <br><br>
        EndingLocation : <input id="endingLocation"  name="endingLocation" size="15" type="text" />  <br><br>
        <br><br>
        morningActivity : <textarea  id="morningActivity" name="morningActivity" ROWS=3 COLS=30 >default text </textarea >
        <br><br>
        afternoonActivity: <textarea  id="afternoonActivity" name="afternoonActivity" ROWS=3 COLS=30 > {{article}}</textarea >
        <br><br>
        lodging : <textarea  id="lodging" name="lodging" ROWS=3 COLS=30 > </textarea > 
         </br> </br>
        <!--     <input name="submit"  id="submit" type="button"  value="Submit"   />  -->
      <input name="Submit" type="submit" value="Submit" onclick="addtext();"/>  
     </form>
  </body>
</html>
