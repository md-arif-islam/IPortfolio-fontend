<?php

require_once "vendor/autoload.php";
$client = new Predis\Client();

// $client->del( 'chatroom-001' );

if ( isset( $_POST['message'] ) ) {
    $sender = $_POST['sender'];
    $message = $_POST['message'];

    $client->rpush( 'chatroom-001', $sender . ": " . $message );
    $message = $client->lrange( 'chatroom-001', 0, $client->llen( 'chatroom-001' ) );
    echo "<p>";
    foreach ( $message as $m ) {
        echo $m . "<br/>";
    }
    echo "<p/>";
}

if ( isset( $_POST['refresh'] ) ) {
    $message = $client->lrange( 'chatroom-001', 0, $client->llen( 'chatroom-001' ) );
    echo "<p>";
    foreach ( $message as $m ) {
        echo $m . "<br/>";
    }
    echo "<p/>";
}
