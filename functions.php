<?php
function logged_in () {
    if (isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function redirect_to ($url) {
    header("Location:{$url}");
}
?>