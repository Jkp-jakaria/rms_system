<?php
if($page=="create-position"){
	$found=include("views/pages/position/create_position.php");
}elseif($page=="edit-position"){
	$found=include("views/pages/position/edit_position.php");
}elseif($page=="positions"){
	$found=include("views/pages/position/manage_position.php");
}elseif($page=="details-position"){
	$found=include("views/pages/position/details_position.php");
}elseif($page=="view-position"){
	$found=include("views/pages/position/view_position.php");
}
?>
