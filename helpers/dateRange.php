<?php
function date_range($first, $last, $step = '+1 month', $output_format = 'd/m/Y' ) {
    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);
    while( $current <= $last ) {
        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }
    return $dates;
}