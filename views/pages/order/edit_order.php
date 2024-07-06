<?php
if(isset($_POST["btnEdit"])){
	$order=Order::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbTableId"])){
		$errors["table_id"]="Invalid table_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOrderTotal"])){
		$errors["order_total"]="Invalid order_total";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbStatusId"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDiscount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtVat"])){
		$errors["vat"]="Invalid vat";
	}

*/
	if(count($errors)==0){
		$order=new Order();
		$order->id=$_POST["txtId"];
		$order->table_id=$_POST["cmbTableId"];
		$order->order_date=date("Y-m-d",strtotime($_POST["txtOrderDate"]));
		$order->order_total=$_POST["txtOrderTotal"];
		$order->remark=$_POST["txtRemark"];
		$order->status_id=$_POST["cmbStatusId"];
		$order->discount=$_POST["txtDiscount"];
		$order->vat=$_POST["txtVat"];

		$order->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="orders">Manage Order</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-order' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$order->id"]);
	$html.=select_field(["label"=>"Table","name"=>"cmbTableId","table"=>"tables","value"=>"$order->table_id"]);
	$html.=input_field(["label"=>"Order Date","type"=>"text","name"=>"txtOrderDate","value"=>"$order->order_date"]);
	$html.=input_field(["label"=>"Order Total","type"=>"text","name"=>"txtOrderTotal","value"=>"$order->order_total"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark","value"=>"$order->remark"]);
	$html.=select_field(["label"=>"Status","name"=>"cmbStatusId","table"=>"status","value"=>"$order->status_id"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount","value"=>"$order->discount"]);
	$html.=input_field(["label"=>"Vat","type"=>"text","name"=>"txtVat","value"=>"$order->vat"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
