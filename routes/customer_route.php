<?php
if($page=="create-customer"){
	$found=include("views/pages/customer/create_customer.php");
}elseif($page=="edit-customer"){
	$found=include("views/pages/customer/edit_customer.php");
}elseif($page=="customers"){
	$found=include("views/pages/customer/manage_customer.php");
}elseif($page=="details-customer"){
	$found=include("views/pages/customer/details_customer.php");
}elseif($page=="view-customer"){
	$found=include("views/pages/customer/view_customer.php");
}
?>
