<?php



$file = PATH_PERSISTENCIA.'encuesta.json';
$encuesta = file_get_contents($file);
$json_encuesta = json_decode($encuesta,true);



require 'views/resultados.view.php';
