<?php
	echo main_sidebar_dropdown([
		"name"=>"Categories",
		"icon"=>"nav-icon fa fa-cubes",
		"links"=>[
			["route"=>"create-category","text"=>"Create Category","icon"=>"far fa-circle nav-icon"],
			["route"=>"categories","text"=>"Manage Category","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>