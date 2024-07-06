<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDetails"])){
		$errors["details"]="Invalid details";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbProductCategoryId"])){
		$errors["product_category_id"]="Invalid product_category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}

*/
	if(count($errors)==0){
		$product=new Product();
		$product->name=$_POST["txtName"];
		$product->details=$_POST["txtDetails"];
		$product->price=$_POST["txtPrice"];
		$product->product_category_id=$_POST["cmbProductCategoryId"];
		$product->photo=upload($_FILES["filePhoto"], "img",$_POST["txtName"]);

		$product->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="products">Manage Product</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-product' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Details","type"=>"text","name"=>"txtDetails"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice"]);
	$html.=select_field(["label"=>"Product Category","name"=>"cmbProductCategoryId","table"=>"product_categories"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
