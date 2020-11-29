<?php

if ( isset( $_REQUEST['number1'] ) && isset( $_REQUEST['number2'] ) && isset( $_REQUEST['number3'] ) ) {

    $a = $_REQUEST['number1'];
    $b = $_REQUEST['number2'];
    $c = $_REQUEST['number3'];
    $d = ( $b * $b ) - ( 4 * $a * $c );
}
