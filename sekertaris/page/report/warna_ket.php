<?php 
if ($data['status'] == "Hadir" ) {
 	$text = "H";
 	$color = "#c6efce";
 }elseif($data['status'] == "Sakit" ) {
 	$text = "S";
 	$color = "#ffeb9c";
 }elseif($data['status'] == "Alfa" ) {
 	$text = "A";
 	$color = "#ffc7ce";
}elseif($data['status'] == "Izin" ) {
 	$text = "I";
 	$color = "#ccc0da";
}elseif($data['status'] == "PKL" ) {
 	$text = "P";
 	$color = "#92cddc";
}
 ?>