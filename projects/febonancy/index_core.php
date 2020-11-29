<?php

if ( isset( $_REQUEST['firstNumber'] ) && isset( $_REQUEST['secondNumber'] ) && isset( $_REQUEST['limit'] ) ) {

    $firstNumber = $_REQUEST['firstNumber'];
    $secondNumber = $_REQUEST['secondNumber'];
    $limit = $_REQUEST['limit'];

    function febonancy( $old, $new, $end ) {

        static $start;
        $start = $start ?? 0;

        if ( $start > $end ) {
            return;
        }

        $start++;

        echo "$old ";

        $oldNew = $old + $new;
        $old = $new;
        $new = $oldNew;

        febonancy( $old, $new, $end );

    }
}
