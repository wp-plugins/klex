<?php
/*
Plugin Name: Klexif
Version: 0.1
Description: Insert exif data
Author: Klaus Lyngsø
*/
function start ($text) {
	preg_match("/\[klexif([^\[]*)\]/i", $text, $regs);
	echo ("Exif: " & $regs[1]
	return $text;
}
add_filter('the_content', 'start');
?>