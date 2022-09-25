<?php session_start(); ?>
<?php include("../template/cabecera.php"); ?><!--Ponemos dos puntitos para salir de la carpeta seccion y entrar a la carpeta template/ cabecera.Lo mismo hacemos con el pie -->

<?php
//Validamos si hay algo en txtId, va a ser igual a $_POST['txtID'], de lo contrario estará vacio ""
//Lo mismo con los demás inputs.

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtNoticia = (isset($_POST['txtNoticia']))?$_POST['txtNoticia']:"";
$txtImagen = (isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$txtAutor = (isset($_POST['txtAutor']))?$_POST['txtAutor']:"";
$fecha = (isset($_POST['fecha']))?$_POST['fecha']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";
$txtFuente = (isset($_POST['txtFuente']))?$_POST['txtFuente']:"";
include("../config/bd.php");

switch ($accion) {
    case 'Agregar': //cogemos el valor del boton submit     que es Agregar
//INSERT INTO `noticias` (`id`, `nombre`, `imagen`) VALUES (NULL, 'noticia de php', 'imagen.jpg');
        //preparamos la instruccion sql
        $sentenciaSQL=$db->prepare("INSERT INTO noticias (nombre, noticia, imagen, autor, fuente) VALUES (:nombre, :noticia, :imagen, :autor, :fuente);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':noticia', $txtNoticia);
        $sentenciaSQL->bindParam(':fuente', $txtFuente);
        //Para que no se sobreescriban las imagenes con nombres iguales vamos a hacer una variable fecha, para saber que por la fecha estas imágenes son distintas.
        $fecha= new DateTime();
        //Variable del nuevo archivo, si envían imagen, le ponemos el nuevo nombre que incluye el tiempo + no,mbre del archivo, para que no se mezcle con archivos del mismo nombre, de lo contrario le damos el nombre imagen.jpg
        $nombreArchivo=($txtImagen!='')?$fecha->getTimestamp(). "_". $_FILES['txtImagen']['name']:"imagen.jpg";
        //creamos una variable de imagen temporal qur será igual a files (archivo, imagen temporal)
        $tmpImagen = $_FILES['txtImagen']['tmp_name'];
        //validamos si el tempImage tiene algo

        if($tmpImagen!=''){
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }
        
        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);// les vamos a dar parámetros, especificamos y ponemos el nimbre con la variable $txtNombre que es la que el usuario nos ha brindado.
        $sentenciaSQL->bindParam(':autor', $txtAutor);
        $sentenciaSQL->execute();//ejecuto la sentencia
        header("Location:gestion_noticias.php");
        break;
    case 'Modificar': //cogemos el valor del boton submit que es Modificar
        $sentenciaSQL=$db->prepare("UPDATE noticias SET nombre =:nombre, noticia =:noticia, autor =:autor, fuente =:fuente  WHERE id=:id");//selecciona desde noticias donde su id = :id
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':noticia', $txtNoticia);
        $sentenciaSQL->bindParam(':autor', $txtAutor);
        $sentenciaSQL->bindParam(':fuente', $txtFuente);
        $sentenciaSQL->bindParam(':id', $txtID);//imprimirlos y mostrarlos en la interfas gráfica
        $sentenciaSQL->execute();
        
            if($txtImagen != ''){

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!='')?$fecha->getTimestamp(). "_". $_FILES['txtImagen']['name']:"imagen.jpg";
                $tmpImagen = $_FILES['txtImagen']['tmp_name'];

                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

                $sentenciaSQL=$db->prepare("SELECT imagen FROM noticias WHERE id=:id");
                $sentenciaSQL->bindParam(':id', $txtID);
                $sentenciaSQL->execute();
                $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
   
                    if(isset($producto['imagen']) && ($producto['imagen'] != 'imagen.jpg')){
   
                        if(file_exists("../../img/".$producto['$imagen'])){
                        unlink("../../img/".$producto['$imagen']);
                        }
   
                    }
                // Actualizamos con la imagen nueva
                $sentenciaSQL=$db->prepare("UPDATE noticias SET imagen =:imagen WHERE id=:id");
                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->bindParam(':id', $txtID);//
                $sentenciaSQL->execute();
                header("Location:gestion_noticias.php");

         }

         header("Location:gestion_noticias.php");

       // echo 'Presionado botón Modificar';
        break;
    case 'Cancelar': //cogemos el valor del boton submit     que es Agregar
        header("Location:gestion_noticias.php");
        break;
    case 'Seleccionar': //cogemos el valor del boton submit que es Seleccionar
        //echo 'Presionado botón Seleccionar';
        $sentenciaSQL=$db->prepare("SELECT * FROM noticias WHERE id=:id");//selecciona desde noticias donde su id = :id
        $sentenciaSQL->bindParam(':id', $txtID);//imprimirlos y mostrarlos en la interfas gráfica
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY); //cargar los datos uno a uno y rellenarlos
        $txtNombre = $producto['nombre'];
        $txtNoticia = $producto['noticia'];
        $txtImagen = $producto['imagen'];
        $txtAutor = $producto['autor'];
        $txtFuente = $producto['fuente'];

        
        break;
    case 'Borrar': //cogemos el valor del boton submit     que es Borrar

         $sentenciaSQL=$db->prepare("SELECT imagen FROM noticias WHERE id=:id");
         $sentenciaSQL->bindParam(':id', $txtID);
         $sentenciaSQL->execute();
         $noticia=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

         //Si existe esta imagen, y es diferente a imagen.jpg para no borrarla, buscamos aver si existe en la carpeta 'img' y si existe la borramos
        if(isset($noticia['imagen']) && ($noticia['imagen'] != 'imagen.jpg')){

            if(file_exists("../../img/".$noticia['$imagen'])){
                unlink("../../img/".$noticia['$imagen']);
            }

        }


        $sentenciaSQL=$db->prepare("DELETE FROM noticias WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        header("Location:gestion_noticias.php");//Se usa para redirigirme al inicio o gestion_noticias.php, los datos no se vuelven a enviar :)
        break;
}

//Para mostrar la información. Ponemos la instruccion sql para seleccionar los noticias, luego la ejecucion.
$sentenciaSQL=$db->prepare("SELECT * FROM noticias");
$sentenciaSQL->execute();
//Para almacenar la instruccion la almacenamos en una variable para poder mostrarla, $listaNoticias lo igualamos a la sentencia que se ejecutó , usamos el metodo fetchAll( recupoera todos los registros para poder mostrarlos, genera una asosiacion entre los datos de la tabla y los registros)
$listaNoticias=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<!--Creamos el crud-->

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de la Noticia
        </div>
        <div class="card-body">
        <!-- Se coloca el atributo enctype = "multipart/form-data", para que por el método POST se recepcionen las imágenes y archivos  -->
            <form method="post" enctype="multipart/form-data">
               
                    <!-- <label for="txtID">ID:</label> -->
                    <input type="text" hidden class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID">
                
                <div class = "form-group">
                    <label for="txtNombre">Título:</label>
                    <input type="text" required  class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Título de la noticia">
                </div>
                <div class = "form-group">
                    <label for="txtID">Noticia:</label>
                    <!-- <input type="text"  class="form-control" value="<?php echo $txtNoticia;?>" name="txtNoticia" id="txtNoticia" placeholder="Redacta tu noticia aquí"> -->
                    <textarea name="txtNoticia" id="txtNoticia" cols="30" rows="10" class="form-control" placeholder="Redacta tu noticia aquí"><?php echo $txtNoticia;?></textarea>
                </div>
                <div class = "form-group">
                    <label for="txtImagen">Imágen:</label>
                    </br>
                    <?php
//Aquí pregunto si existe algo que sería la imagen, entonces la mostramos
                        if($txtImagen!=""){
                    ?>
                        <img class= "img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" width="50" alt="Foto de la Portada de la Noticia">
                    <?php   
                        }
                    ?>
                        <input type="file" class="form-control" name="txtImagen" id="txtImagen">
                </div>
             
                <div class = "form-group">
                    <label for="txtAutor">Autor:</label>
                    <input type="text"  class="form-control" value="<?php echo $txtAutor;?>" name="txtAutor" id="txtAutor" placeholder="Nombre del autor">
                </div>
                <div class = "form-group">
                    <label for="txtFuente">Fuente:</label>
                    <input type="text"  class="form-control" value="<?php echo $txtFuente;?>" name="txtFuente" id="txtFuente" placeholder="URL de la fuente">
                </div>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo ($accion == "Seleccionar")? "disabled":"";?> value ="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" <?php echo ($accion !== "Seleccionar")? "disabled":"";?> value ="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion"  <?php echo ($accion !== "Seleccionar")? "disabled":"";?> value ="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Noticia</th>
                <th>Imagen</th>
                <th>Autor</th>
                <th>Fecha de publicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaNoticias as $noticia) {?>
            <tr>
                <td><?php echo $noticia['id']; ?></td>
                <td><?php echo $noticia['nombre']; ?></td>
                <td><?php echo $noticia['noticia']; ?></td>
                <td>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $noticia['imagen']; ?>" width="70" alt="Foto de la Portada de la Noticia">
                </td>
                <td><?php echo $noticia['autor']; ?></td>
                <td><?php echo $noticia['fecha']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $noticia['id']; ?>"/>
                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                    </form>
                </td>
                
                
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php include("../template/pie.php"); ?>