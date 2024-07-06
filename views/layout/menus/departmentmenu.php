<?php
	echo main_sidebar_dropdown([
		"name"=>"Department",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-department","text"=>"Create Department","icon"=>"far fa-circle nav-icon"],
			["route"=>"departments","text"=>"Manage Department","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
