<?php
require_once('credentials.php');
error_log('squirrellyPost'.print_r($_POST, true));


$_POST['html']=addslashes($_POST['html']);
preg_match('/eceipt\s[form]+\s(\$[,.\d]+)\sat\s(.*)\son\s([A-Za-z\s\d]+)\sat/', $_POST['html'], $receiptMatches, PREG_OFFSET_CAPTURE);
preg_match('/([0-9a-zA-Z_\.]+)@/', $_POST['to'], $userMatch, PREG_OFFSET_CAPTURE);
if (count($receiptMatches)){
    $working = 1;
}else{
    $working = 0;
}

$query = "INSERT INTO receivedEmail
            SET
            subject='{$_POST['subject']}',
            emailText='{$_POST['text']}',
            htmlSource='{$_POST['html']}',
            sender='{$_POST['from']}',
            userName='{$userMatch[1][0]}',
            sent=NOW(),
            total='{$receiptMatches[1][0]}',
            storeName='{$receiptMatches[2][0]}',
            date='{$receiptMatches[3][0]}',
            workingRegEx='{$working}'";

error_log('squirrellyQuery '.$query);
mysqli_query($connection, $query);

echo $query;
?>