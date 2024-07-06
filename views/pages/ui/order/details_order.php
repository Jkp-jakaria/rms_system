<?php
if(isset($_POST["btnDetails"])){
	$order=Order::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="orders">Manage Order</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Order Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$order->id</td></tr>";
		$html.="<tr><th>Table Id</th><td>$order->table_id</td></tr>";
		$html.="<tr><th>Order Date</th><td>$order->order_date</td></tr>";
		$html.="<tr><th>Order Total</th><td>$order->order_total</td></tr>";
		$html.="<tr><th>Remark</th><td>$order->remark</td></tr>";
		$html.="<tr><th>Status Id</th><td>$order->status_id</td></tr>";
		$html.="<tr><th>Discount</th><td>$order->discount</td></tr>";
		$html.="<tr><th>Vat</th><td>$order->vat</td></tr>";
		$html.="<tr><th>Created At</th><td>$order->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$order->updated_at</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
