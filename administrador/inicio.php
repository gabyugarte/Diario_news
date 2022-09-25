<?php 
 session_start();

include('template/cabecera.php'); 
$user = ucwords($_SESSION['usuario']);
?>


<?php if (isset($_SESSION['usuario'])): ?>
          <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-3">Bienvenido (a) <?= $user ; ?></h1>
                <p class="lead">Vamos a administrar nuestras noticias en el sitio Web</p>
                <hr class="my-2">
                <p>More info</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="seccion/gestion_noticias.php" role="button">Administrar noticias</a>
                </p>
            </div>  
          </div>
<!-- //Incluimos el logs.php.  -->
<?php 
      include('../logs.php');
      $user=  $_SESSION['usuario']; 
      $log=new Log("log.txt");
      $log->writeline("I", "Todo correcto, usuario ". "[" .$user. "] ingreso a la página ");
      $log->close();
 ?>
 <?php else: ?>
  <h1>Usted no es Administrador</h1>
  <a href="#">Aquí</a>
 <?php endif; ?>
  
<?php include('template/pie.php'); ?>


