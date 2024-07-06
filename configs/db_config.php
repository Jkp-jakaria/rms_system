<?php
//Remote

//  define("SERVER","localhost");
//  define("USER","jakaria");
//  define("DATABASE","pwad2024_jakaria");
//  define("PASSWORD","jakaria@h678;");

//Local

define("SERVER", "localhost");
define("USER", "root");
define("DATABASE", "test");
define("PASSWORD", "");

$db = new mysqli(SERVER, USER, PASSWORD, DATABASE);
$tx = "rms_";
