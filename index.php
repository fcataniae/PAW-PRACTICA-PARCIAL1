<?php
define("PATH_PERSISTENCIA", "persistencia\\");

require 'core/bootstrap.php';
require 'routes.php';

$url = $app->request->getUrl();
require $app->router->direct($url);
