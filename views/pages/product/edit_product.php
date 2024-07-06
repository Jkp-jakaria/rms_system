<?php
if(isset($_POST["btnEdit"])){
	$product=Product::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$product->id=$_POST["txtId"];
		$product->name=$_POST["txtName"];
		$product->details=$_POST["txtDetails"];
		$product->price=$_POST["cmbPrice"];
		$product->product_category_id=$_POST["cmbProductCategoryId"];
		
		if($_FILES["filePhoto"]["name"]!=""){ // Check if a new image is uploaded
			$product->photo=upload($_FILES["filePhoto"], "img",$_POST["txtName"]);
		}else{
			// Retain the existing photo from the database
			$existingProduct = Product::find($_POST["txtId"]);
			$product->photo = $existingProduct->photo;
		}

		$product->update();
	}else{
		print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="products">Manage Product</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-product' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$product->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$product->name"]);
	$html.=input_field(["label"=>"Details","type"=>"text","name"=>"txtDetails","value"=>"$product->details"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"cmbPrice","value"=>"$product->price"]);
	$html.=select_field(["label"=>"Product Category","name"=>"cmbProductCategoryId","table"=>"product_categories","value"=>"$product->product_category_id"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
