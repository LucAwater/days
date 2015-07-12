<?php
$mon_name = array( get_field('monday') );
$mon_items = array( get_field('monday_item') );
$monday = array_merge( $mon_name, $mon_items );

$tue_name = array( get_field('tuesday') );
$tue_items = array( get_field('tuesday_item') );
$tuesday = array_merge( $tue_name, $tue_items );

$wed_name = array( get_field('wednesday') );
$wed_items = array( get_field('wednesday_item') );
$wednesday = array_merge( $wed_name, $wed_items );

$thu_name = array( get_field('thursday') );
$thu_items = array( get_field('thursday_item') );
$thursday = array_merge( $thu_name, $thu_items );

$fri_name = array( get_field('friday') );
$fri_items = array( get_field('friday_item') );
$friday = array_merge( $fri_name, $fri_items );

$sat_name = array( get_field('saturday') );
$sat_items = array( get_field('saturday_item') );
$saturday = array_merge( $sat_name, $sat_items );

$sun_name = array( get_field('sunday') );
$sun_items = array( get_field('sunday_item') );
$sunday = array_merge( $sun_name, $sun_items );

$days = array( $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday );
?>
