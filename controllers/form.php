<?php

$title = 'Validar formulario y visualizacion de resumen';
$pantalla = '/';
$mensaje = 'Volver al menu principal';


$controles = [];

if( !(isset($_POST['nombre']) &&
  preg_match('/^[A-Za-z]/',$_POST['nombre'])) )
{
  $controles[] = "ERROR CAMPO: NOMBRE DEL ENCUESTADO";
}

if( !(isset($_POST['apellido']) &&
  preg_match('/^[A-Za-z]/',$_POST['apellido'])) )
{
  $controles[] = "ERROR CAMPO: APELLIDO DEL ENCUESTADO";
}

if( !(isset($_POST['email']) &&
    filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ))
{
  $controles[] = "ERROR CAMPO: EMAIL, NO VALIDO";
}

if( (!(isset($_POST['lenguaje']) &&
    is_string($_POST['lenguaje'])) || $_POST["lenguaje"] == "") )
{
  if( !(isset($_POST['lenguaje2']) &&
      is_string($_POST['lenguaje2'])) || $_POST["lenguaje2"] == "") {
        $controles[] = "ERROR CAMPO: LENGUAJE, NO VALIDO";
  }else{
    $_POST["lenguaje"] = $_POST["lenguaje2"];
  }
}



if(empty($controles)){

  $file = PATH_PERSISTENCIA.'encuesta.json';
  $json_turnos = [];
  $contador = 1;

  if (file_exists($file)){
    // si existe el archivo -> leo los datos que contiene
    $turnos = file_get_contents($file);
    $json_turnos = json_decode($turnos);
    // se calcula el id
    $contador = count($json_turnos) + 1;
  }



  $turno = array('id_encuesta' => $contador,
            'nombre' => $_POST["nombre"],
            'apellido'=> $_POST["apellido"],
            'lenguaje' => $_POST["lenguaje"]);

  $json_turnos[] = $turno;
  $json_string = json_encode($json_turnos);
  file_put_contents($file, $json_string);

  $file = PATH_PERSISTENCIA.'lenguajes.json';
  $lenguajes = file_get_contents($file);
  $json_lenguajes = json_decode($lenguajes,true);

  $esta = false;

  for($i = 0 ; $i < count($json_lenguajes); $i++){
    if($_POST["lenguaje"] == $json_lenguajes[$i]["lenguaje"]){
      $esta = true;
    }
  }
  if(!$esta){
    $lenguaje = array( 'lenguaje' => $_POST["lenguaje"]);
    $json_lenguajes[] = $lenguaje;
    $json_en = json_encode($json_lenguajes);
    file_put_contents($file, $json_en);
  }

  $page = "aprob.view.php";
}else{
  $page =  "error.view.php";
}
require 'views/index.view.php';
