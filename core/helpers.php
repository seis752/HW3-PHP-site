<?php
// Helper function that redirects you to an URL
function redirect($url){
    if(empty($url)){
        $url = basename($_SERVER['PHP_SELF']);
    }
    if(!headers_sent()){
        header('Location: ' . $url);
        exit;
    } else {
        echo "<script type=\"text/javascript\">\n";
        echo "window.location.href=\"$url\";\n";
        echo "</script>\n";
        echo "<noscript>\n";
        echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\" />\n";
        echo "</noscript>\n";
        exit;
    }
}
?>