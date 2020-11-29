<?php

include_once "config.php";

$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

if ( !$connection ) {
    throw new Exception( "Can't connect database" );
} else {
    // do something
    echo "Connected";
    // insert record
    // INSERT INTO tasks (task,date) VALUES ('Do Something',"2019-05-10")
    /* mysqli_query( $connection, "INSERT INTO tasks (task, date) VALUES ('Do something','2019-05-10')" );*/

    // $result = mysqli_query( $connection, "SELECT * FROM tasks" );

    // while ( $data = mysqli_fetch_array( $result ) ) {
    //     echo "<pre>";
    //     print_r( $data );
    //     echo "<pre/>";
    // }

    mysqli_close( $connection );
}
