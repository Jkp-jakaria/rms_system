<?php
if(isset($_POST["btnEdit"])){
	$person=Person::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbPositionId"])){
		$errors["position_id"]="Invalid position_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["rdoSex"])){
		$errors["sex"]="Invalid sex";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDob"])){
		$errors["dob"]="Invalid dob";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDoj"])){
		$errors["doj"]="Invalid doj";
	}
	if(!is_valid_mobile($_POST["txtMobile"])){
		$errors["mobile"]="Invalid mobile";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["chkInactive"])){
		$errors["inactive"]="Invalid inactive";
	}

*/
	if(count($errors)==0){
		$person=new Person();
		$person->id=$_POST["txtId"];
		$person->name=$_POST["txtName"];
		$person->position_id=$_POST["cmbPositionId"];
		$person->sex=$_POST["rdoSex"];
		$person->dob=$_POST["txtDob"];
		$person->doj=$_POST["txtDoj"];
		$person->mobile=$_POST["txtMobile"];
		$person->address=$_POST["txtAddress"];
		$person->inactive=isset($_POST["chkInactive"])?1:0;

		$person->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="persons">Manage Person</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-person' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$person->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$person->name"]);
	$html.=select_field(["label"=>"Position","name"=>"cmbPositionId","table"=>"positions","value"=>"$person->position_id"]);
	$html.=input_field(["label"=>"Male","type"=>"radio","name"=>"rdoSex","value"=>"$person->sex","checked"=>$person->sex?"checked":""]);
	$html.=input_field(["label"=>"Female","type"=>"radio","name"=>"rdoSex","value"=>"$person->sex","checked"=>$person->sex?"checked":""]);
	$html.=input_field(["label"=>"Dob","type"=>"date","name"=>"txtDob","value"=>"$person->dob"]);
	$html.=input_field(["label"=>"Doj","type"=>"date","name"=>"txtDoj","value"=>"$person->doj"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile","value"=>"$person->mobile"]);
	$html.=input_field(["label"=>"Address","type"=>"text","name"=>"txtAddress","value"=>"$person->address"]);
	$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"chkInactive","value"=>"$person->inactive","checked"=>$person->inactive?"checked":""]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
