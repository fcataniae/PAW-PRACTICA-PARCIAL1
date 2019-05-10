<?php

$title = 'Encuesta';
$today =  date("Y-m-d");


$file = PATH_PERSISTENCIA.'lenguajes.json';
$lenguajes = file_get_contents($file);
$json_lenguajes = json_decode($lenguajes,true);


$page = "form.view.php";
require 'views/index.view.php';
