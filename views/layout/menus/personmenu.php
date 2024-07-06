<?php
	echo main_sidebar_dropdown([
		"name"=>"Person",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-person","text"=>"Create Person","icon"=>"far fa-circle nav-icon"],
			["route"=>"persons","text"=>"Manage Person","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
