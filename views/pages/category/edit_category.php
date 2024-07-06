<?php
if(isset($_POST["btnEdit"])){
	$category=Category::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbSectionId"])){
		$errors["section_id"]="Invalid section_id";
	}

*/
	if(count($errors)==0){
		$category=new Category();
		$category->id=$_POST["txtId"];
		$category->name=$_POST["txtName"];
		$category->created_at=$now;
		$category->updated_at=$now;

		$category->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="categories">Manage Category</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-category' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$category->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$category->name"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
