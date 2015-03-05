/**
 * Created by Warsame-Bashir on 3/3/15.
 */
$(document).ready(function(){

	$('#searchButton').click(function(e){
		// Set Search String
    var searchString = $("#searchInput").val();
    
		$.ajax({
		      url: 'search.php',
		      type: 'get',
		      data: {'query': searchString},
		      success: function(data, status) {
		        
		          $('#usersList').html(data);
		          
		        
		      },
		      error: function(xhr, desc, err) {
		        console.log('error');
		      }
		    }); // end ajax call

	});
       
});


// var xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function(){
// 	if(xhr.readyState == 4){

// 	}
// }

// xhr.open('GET', 'search_results.php?query')