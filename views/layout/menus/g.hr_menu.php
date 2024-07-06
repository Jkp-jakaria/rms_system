<?php
	echo main_sidebar_dropdown([
		"name"=>"HR",
		"icon"=>"nav-icon fas fa-user-tie",
		"links"=>[
			["route"=>"departments","text"=>"Manage Department","icon"=>"far fa-circle nav-icon"],
			["route"=>"create-position","text"=>"Create Position","icon"=>"far fa-circle nav-icon"],
			["route"=>"positions","text"=>"Manage Position","icon"=>"far fa-circle nav-icon"],
			["route"=>"persons","text"=>"Manage Person","icon"=>"far fa-circle nav-icon"]
		]
	]);
?>
