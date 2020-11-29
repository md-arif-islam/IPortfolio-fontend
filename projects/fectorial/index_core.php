<?php

if ( isset( $_REQUEST['number'] ) ) {
    $n = $_REQUEST['number'];
    for ( $i = $n, $factorial = 1; $i > 0; $i-- ) {
        $factorial = $factorial * $i;
    }
}