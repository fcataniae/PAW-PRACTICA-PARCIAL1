<?php

function dd($variable, $die_string = "")
{
    if (! is_array($variable)) {
        var_dump($variable);
    } else {
        echo "<pre>";
        print_r($variable);
    }
    die($die_string);
}

/**
 * Util function to join filesystem paths
 * Source: https://stackoverflow.com/questions/1091107/how-to-join-filesystem-path-strings-in-php
 * @return string The path builded with params
 */
function join_paths()
{
    $paths = array();
    foreach (func_get_args() as $arg) {
        if ($arg !== '') {
            $paths[] = $arg;
        }
    }
    return preg_replace('#/+#', '/', join('/', $paths));
}

/**
 * Helper para construir la uri completa de un archivo estatico (css, img, js)
 */
function statics($filename)
{
    global $app;
    return $app->config->getStaticPath($filename);
}

/**
 * Retorna la clase activa para el link del nav (si aplica)
 *
 * $request_uri_link    string  El contenido del href a ser comparado
 */
function setActive($request_uri_link)
{
    return ($request_uri_link === $_SERVER['REQUEST_URI']) ? "active" : "";
}

function validar_fecha($fecha){
    $valores = explode('-', $fecha);
    if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
        return true;
    }
    return false;
}

function hourIsBetween($from, $to, $input) {
    $dateFrom = DateTime::createFromFormat('!H:i', $from);
    $dateTo = DateTime::createFromFormat('!H:i', $to);
    $dateInput = DateTime::createFromFormat('!H:i', $input);
    if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
    return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
}

function in_range($value, $min, $max){
  return ($value>$min) && ($value<$max);
}
