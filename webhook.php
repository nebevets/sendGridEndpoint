<?php

require_once('credentials.php');
error_log('message*$*$*$*$*$*$*$*$*'.print_r($_POST, true));

$_POST['html']=addslashes($_POST['html']);

$query = "INSERT INTO receivedEmail SET subject='{$_POST['subject']}', body='{$_POST['text']}', sender='{$_POST['from']}', recipient='{$_POST['to']}', sent=NOW()";

error_log('messageYYYYYYY '.$query);
mysqli_query($connection, $query);

?>