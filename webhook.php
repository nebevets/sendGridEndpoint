<?php

require_once('credentials.php');
error_log('squirrelly'.print_r($_POST, true));

$_POST['html']=addslashes($_POST['html']);

$query = "INSERT INTO receivedEmail SET subject='{$_POST['subject']}', emailText='{$_POST['text']}', htmlSource='{$_POST['html']}', sender='{$_POST['from']}', recipient='{$_POST['to']}', sent=NOW()";

error_log('messageYYYYYYY '.$query);
mysqli_query($connection, $query);

?>