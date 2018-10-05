<?php

require_once('credentials.php');

$query = "INSERT INTO receivedEmail SET subject='{$_POST['subject']}', body='{$_POST['email']}', sender='{$_POST['from']}', recipient='{$_POST['to']}', sent=NOW()";

mysqli_query($conn, $query);

?>