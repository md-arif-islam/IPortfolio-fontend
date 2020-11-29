<?php

if ( isset( $_REQUEST['base'] ) && isset( $_REQUEST['height'] ) ) {

    $base = $_REQUEST['base'];
    $height = $_REQUEST['height'];

    $result = ( $base * $height ) / 2;

}
