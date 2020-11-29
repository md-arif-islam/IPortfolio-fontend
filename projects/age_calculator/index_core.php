<?php

if ( isset( $_REQUEST['day'] ) && isset( $_REQUEST['month'] ) && isset( $_REQUEST['year'] ) ) {

    $day = $_REQUEST['day'];
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];

    date_default_timezone_set( "Asia/Dhaka" );
    $birtDate = new DateTime( "$day.$month.$year" );
    $today = new DateTime( date( "d.m.y" ) );

    $diff = $today->diff( $birtDate );

}
