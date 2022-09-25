<?php 
session_start();

//Incluimos el registrologs.php. 
include('../../logs.php');
$user=  $_SESSION['usuario']; 
$log=new Log("log.txt");
$log->writeline("L", "Usuario ". "[" .$user. "] cerró la sesión");
$log->close();

//Eliminamos cookie cuando cerramos la sesión
setcookie("Usuario_Admin", $_SESSION['usuario'], time() - 60, '/');
unset($_COOKIE[$_SESSION['usuario']]);

//eliminamos la sesión y variables
session_unset();

//destruimos la sesión
session_destroy();

//redireccionamos a la pag principal
header('Location:../../index.php');

?>