<?php

// Vamos a preguntar si hay un usuario loggeado?
//Para manejar las sesiones Usamos $_SESSION, creamos esta variable
if (!isset($_SESSION['usuario'])){//Si es vacío, vamos a redincionar con header Location si no hay usuario logeado
    header("Location:../login.php");
}else
{
    if($_SESSION['usuario']== "admin"){
        $nombreUsuario = $_SESSION['nombreUsuario'];
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>DIARIO-NEWS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <!--Creamos una variable para poner la redirección, variable url, le indicamos que se va a redireccionar a http://, y la variable $_SERVER  que me va a dar info del host donde estoy (localhost) dato HTTP_HOST  este nos devuelve la url y lo concatenamos con nuestras carpetas //php/ sitioWeb3-->
      <?php  $url="http://".$_SERVER['HTTP_HOST']."/sitioWeb3" ?> 

  <nav class="navbar navbar-expand navbar-light bg-light fixed-top">
      <div class="nav navbar-nav">
          <a class="nav-item nav-link active" href="#">Administrador del sitio Web <span class="sr-only">(current)</span></a>
            <?php 
            if (isset($_SESSION['usuario'])) 
            {
                $user = ucwords($_SESSION['usuario']); 
            ?>
            <li class="nav-item"><a class="nav-link" href="#"><?= 'Hola'. ' ' .$user; ?></a></li>
            <?php } ?>
          <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/inicio.php ">Inicio</a>
          <a class="nav-item nav-link"  href="<?php echo $url; ?>/administrador/noticias.php">Ver noticias</a>
          <a class="nav-item nav-link"  href="<?php echo $url; ?>/administrador/seccion/gestion_noticias.php ">Administrar noticias</a>
          <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/cerrar.php">Cerrar sesión</a>
            
         
      </div>
  </nav>
<br><br>
  <div class="container">
      <br>
      <div class="row">
          

