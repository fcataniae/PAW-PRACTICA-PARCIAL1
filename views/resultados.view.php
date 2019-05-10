<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $title ?></title>
    <script type="text/javascript" src="statics/js/resultados.js"></script>

    <link rel="stylesheet" href="statics/css/main.css">
    <script type="text/javascript" >
      var Resultados = <?= json_encode($json_encuesta);?>

      Tabla.onLoadWindow("contenedor");
    </script>
    <meta charset="utf-8" />
</head>
<body>
	<?php require "nav.view.php" ?>
  <div id="contenedor"></div>

</body>
</html>
