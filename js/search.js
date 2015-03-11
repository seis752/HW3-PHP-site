/**
 * Created by Warsame-Bashir on 3/3/15.
 */
$(document).ready(function () {

    $('#searchButton').click(function (e) {
        // Set Search String
        var searchString = $("#searchInput").val();

        $.ajax({
            url: 'search.php',
            type: 'get',
            data: {'query': searchString},
            success: function (data, status) {

                $('#usersList').html(data);


            },
            error: function (xhr, desc, err) {
                console.log('error');
            }
        }); // end ajax call

    });

});

function searchXML() {
    var xhr = new XMLHttpRequest();
    var q = document.getElementById("searchInput").value;
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            var return_data = xhr.responseText;
            document.getElementById("usersList").innerHTML = return_data;
        }
    }

    xhr.open('GET', 'search.php?query=' + q, false);
    xhr.send();
}
