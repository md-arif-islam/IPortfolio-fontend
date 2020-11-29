<?php

$inputYear = $_REQUEST['inputYear'];

/*
Condition -
1.divition by 4
2.divition by 100(not)
3.divition by 400
 */

if ( is_numeric( $inputYear ) ) {
    if ( $inputYear % 4 == 0 && ( $inputYear % 100 != 0 || $inputYear % 400 == 0 ) ) {
        header( "location:index.php?true" );
    } else {
        header( "location:index.php?false" );
    }
} else {
    header( "location:index.php?not" );
}

/*
true && (true || true)
true && false
false

true && (false || false)
true && fals
false

true && (true || false)
true && true
true

true && (false || true)
true && true
true

 */
