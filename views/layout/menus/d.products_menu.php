<?php
	echo main_sidebar_dropdown([
		"name"=>"Products",
		"icon"=>"nav-icon fa fa-list",
		"links"=>[
			["route"=>"create-product","text"=>"Create Products","icon"=>"far fa-circle nav-icon"],
			["route"=>"products","text"=>"Manage Products","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>