<?php
	echo main_sidebar_dropdown([
		"name"=>"Reports",
		"icon"=>"nav-icon fa fa-file-text-o",
		"links"=>[
			["route"=>"order-report","text"=>"Daily Order Report","icon"=>"far fa-circle nav-icon"],
			// ["route"=>"reports","text"=>"Manage Reports","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>