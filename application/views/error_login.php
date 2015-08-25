<!DOCTYPE html>
<html lang="es">
 <head>
    <meta charset="utf-8" />
    <title><?php echo $title ?> - Agenda Mascotas Luna</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Resumen del contenido de la página">
 		<meta name="author" content="Carlos Javier Vidal Ferrero">

    <link rel="stylesheet" type="text/css" href="<?= base_url()?>css/bootstrap/css/bootstrap.css">
    <!-- Material Design for Bootstrap -->
    <link href="<?= base_url()?>bower_components/bootstrap-material-design/dist/css/material-wfont.min.css" rel="stylesheet">
    <link href="<?= base_url()?>bower_components/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">
    <!-- Dropdown.js -->
    <link href="<?= base_url()?>jquery_dd_css/jquery.dropdown.css" rel="stylesheet">
 </head>
 <body>
 	<div class="container">
 		<div class="row">
		 	<div class="jumbotron">
				<h1>Atención</h1>
				<p>No ha iniciado sesión, el contenido de la página a la que intenta acceder no se puede mostrar.
				</p>
			</div>
		</div>
	</div>
<center> <a class="btn btn-primary" role="button" href="<?= base_url()?>login/index">Ir a Login</a></center>
</body>
</html>