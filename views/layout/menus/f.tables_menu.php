<?php
	echo main_sidebar_dropdown([
		"name"=>"Table",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-table","text"=>"Create Table","icon"=>"far fa-circle nav-icon"],
			["route"=>"tables","text"=>"Manage Table","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
