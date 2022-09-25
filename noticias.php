<?php 

session_start();
include 'template/cabecera.php'; 
include "administrador/config/bd.php"; 

//Aquí hago conexion a la base de datos para seleccionar todas la info de la tabla noticias
$sentenciaSQL=$db->prepare("SELECT * FROM noticias");
$sentenciaSQL->execute();
$listaNoticias=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<!--Aquí uso la funcion foreach la cual va a leer todos los registros que estan en la lista de noticias, de tal forma que esta noticia tendrá toda la info que necesitamos -->
<?php foreach($listaNoticias as $noticia) { ?>
<!-- imprimimos todas las noticias a nuestra página web para que el usuario las pueda ver -->
<div class="col-md-4">
    <div class="card">
        <img class="card-img-top" src="./img/<?php echo $noticia['imagen'];?>" alt="imagen de la noticia del día">
        <div class="card-body">
            <h4 class="card-title"><?php echo $noticia['nombre'];?></h4>
            <p class="card-description"><?php echo $noticia['noticia'];?></p>
            <p class="card-description"> Autor: <?php echo $noticia['autor'];?></p>
            <p class="card-description"> Fecha de publicación: <?php echo $noticia['fecha'];?></p>
            <a name="" id="" class="btn btn-primary" href="<?php echo $noticia['fuente'];?>" role="button" target="_blanck"  >Ver más</a>
        </div>
    </div>
</div>

<?php }?>


<!-- Modal LOGIN---------------------------------------------------------------------------------------------------->
   <!-- Modal Se recomienda poner el Modal por último fuera de las secciones-->
<?php include './administrador/login_modal.php';?>
   <!-- /Modal LOGIN------------------------------------------------------------------------------------------------>

<?php include('template/pie.php'); ?>