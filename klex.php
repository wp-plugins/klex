<?php
/*
Plugin Name: KLEX
Version: 0.9
Description: Show exif data directly from photos in your blog. This plugin examines the jpg or tiff photo for exif data and lets you display the interesting ones.
Author: Klaus Lyngsø
*/
function start ($text) {
	// look for klex tags in the entire post
	$pattern = "/(\[klex.*\"\])/i";
	if (preg_match_all($pattern, $text, $matches)) {
		$count = 0;
		foreach ($matches as $val) {
			if ($count == 1) {
			foreach ($val as $string) {
				// Get the url from the tag
				$MyPic = GetUrl($string);
				$MyExif = GetExif($MyPic);		
				/* 
				We don't want to mess with tags from other plugins.
				For this reason we add KLEX in the beginning and end in order to be able to remove [KLEX and KLEX] 
				from the entire text before showing post ... */
	    	$newStr = "KLEX " . $MyExif . "KLEX";
	    	$mypattern = "$string";
	     // Replacing the tag with the exif data
				$text = preg_replace($mypattern , $newStr, $text);			
			}
		}
			$count ++;
  	}
		
	}
	else {	
	}
	$text = preg_replace('/\[KLEX/', '', $text);
	$text = preg_replace('/KLEX\]/', '', $text);
	return $text;
} 

function GetUrl($tag) {
	$MyStr = "Div exif data";		
	if (preg_match("/pic\=\"(.*)\"/i", $tag, $url)) {
		$MyUrl = $url[1];	
	}
	else {
		$MyUrl = "No Exif data found";
	}
	
	return $MyUrl;
}

function GetExif($pic) {
			// Read the exif array
			 
				$exif = exif_read_data($pic, 0, true);
				
			
			// check if exif are available:
				// pick the exif data we want and format them to become readable
		    $fnumber = $exif[COMPUTED][ApertureFNumber];
	      $iso = "ISO: " . $exif[EXIF][ISOSpeedRatings];
	      $shutterspeed = "Shutter: " .  $exif[EXIF][ExposureTime]; 
	      $model = $exif[IFD0][Model];      
	      // Focal length is often given as a fraction. Canon says 125/1 while Nikon says 1250/10. We want to show 125 mmm
	      $fl =  $exif['EXIF']['FocalLength'] ;      
	      if (preg_match("/\//", $fl, $matches)) {
	      	$pieces = explode("/", $fl);
	      	$numerator = $pieces[0];
	      	$denominator = $pieces[1];
	      	$focallength = "Focal Length: " . intval($numerator)/intval($denominator) . " mm";      	
	      }
	      else {
	      	$focallength = "Focal Length: " . $exif['EXIF']['FocalLength'] . " mm";
	    	}
	    	// if lens is avaiable, we want to show it:
	      if ($exif['MAKERNOTE']['UndefinedTag:0x0095']) {      	
	      	$lens = "Lens: " . $exif['MAKERNOTE']['UndefinedTag:0x0095'];
	      }
	      else {
	      	$lens = "";
	      }       	
				$flash = "Flash: " . $exif['EXIF']['Flash'];			
	      return $model . " " . $lens .  " " . $fnumber . " ". $shutterspeed . " sec" . " " . $focallength . " " . $iso;
	  
	   	   	
	  
}

add_filter('the_content', 'start');
?>