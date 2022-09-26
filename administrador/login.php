<?php
session_start(); //Obligatorio para trabajar con las sessiones
// error_reporting(0); //
//Traemos toda la data
include 'template/cabecera.php'; 
include "./config/bd.php"; 
//Aquí valido la información que el usuario coloca en el form.
if (isset($_POST["submit"])) {
    $nombre = $_POST['usuario'];
    $password =$_POST['contrasenia'];
    //hago la consulta a la base de datos para verificar si los datos ingresados son correctos
    $consulta =$db->prepare("SELECT * FROM usuarios WHERE nombre =:nombre AND password =:password") ;
    //Pasamos como parámetros a nombre y password para verificación
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':password', $password);
    // ejecutamos la consulta
    $consulta->execute();
    //creo una variable usuario que usaré más adelante para validar con el nombrede usuario de la bd
    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if($usuario){
      $_SESSION['usuario'] = $usuario["nombre"];
            header('location:./inicio.php');
    // Aquí crearé una cookie que expirará en 1 día
            setcookie("Usuario_Admin", $_SESSION['usuario'], time() + (86400 * 30), "/");

    }else{
      header('location:../index.php');
      $mensaje = "Error: El usuario o contraseña son incorrectas";
      
      //Incluimos el logs.php.
            include('../logs.php');
            $log=new Log("log.txt");
            $log->writeline("E", "Error de loggin");
            $log->close();
    }
}    
 
?>
<?php
  //  <!-- /Modal -->

  include 'login_modal.php';
  include 'template/pie.php';
?>