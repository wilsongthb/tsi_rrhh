<pre>
<?php
foreach($arr_obj as $entidad){
	print_r($entidad->direccion);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Personal</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </head>
<body>
<a href="images/484.gif">I'M HAPPY</a>
<div class="container">
  <h1>Tabla Personal</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombres</th>
        <th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Fecha de Nacimiento</th>
		<th>Lugar de Nacimiento</th>
		<th>Direccion</th>
		<th>Nivel de Instruccion</th>
		<th>Estado Civil</th>
		<th>DNI</th>
		<th>Estado</th>
      </tr>
    </thead>
    <tbody>
<?php 
foreach($arr_p as $persona){
	echo "<tr>";
	foreach($persona as $campo){
		echo "<td>" . $campo . "</td>";
	}
	echo "</tr>";
}
?>
    </tbody>
  </table>
</div>