<?php
include 'core/init.php';
include 'views/common/header.php';
require_once("api/TwilioMessage.php");


$s = array();
foreach ($_POST as $k => $v) {
    $ans .= $k.'='.$v."\n";
}
echo $ans;

// Check if this is actually a twilio call
if(isset($_POST['Body'])){
    $ans = mysql_real_escape_string($_POST['Body']);
    // clean up values that could bork MySQL
    $ans = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $_POST['Body']);
    $_SESSION['tmessage'] = $ans;
    $_SESSION['twilioFrom'] = $_POST['From'];

    $message = new TwilioMessage();
    $message->createMessage();

}
