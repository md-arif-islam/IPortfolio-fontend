<?php

// Database ----------------
$dbhost = 'localhost';
$dbusername = 'arif';
$dbpwd = 'arif123';
$dbname = 'iportfolio';

$connection = mysqli_connect( $dbhost, $dbusername, $dbpwd, $dbname );

if ( !$connection ) {
    echo mysqli_error( $connection );
} else {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];

    if ( $name && $email && $subject && $message ) {
        $query = "INSERT INTO contact (name,email,subject,message) VALUES ('{$name}','$email','$subject','$message');";
        $result = mysqli_query( $connection, $query );
        echo "Message sent successfully...";
    }
}
