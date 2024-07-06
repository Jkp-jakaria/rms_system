<?php
if(isset($_POST["btnDetails"])){
	$product=Product::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="products">Manage Product</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Product Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$product->id</td></tr>";
		$html.="<tr><th>Name</th><td>$product->name</td></tr>";
		$html.="<tr><th>Details</th><td>$product->details</td></tr>";
		$html.="<tr><th>Price</th><td>$product->price</td></tr>";
		$html.="<tr><th>Product Category Id</th><td>$product->product_category_id</td></tr>";
		$html.="<tr><th>Photo</th><td><img src='img/$product->photo' width='100' /></td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
