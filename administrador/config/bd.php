
<?php

    //Nos conectamos a la base de datos:
   
    $dbname="diario_news";
    $user="root";
    $password="";

    //instruccion trycatch
    //creamos una variable $coneccion PDOse comunicarà directamente con la base de datos, lo necesitamos, dentro ponemos la instruccion
    try {
        $db = new PDO('mysql:host=localhost;dbname=' . $dbname, $user, $password);
        $db->query("set names utf8;");
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $db;
        
    } catch (Exception $e) {
        echo "Error obteniendo BD: " . $e->getMessage();
        return null;
    }

?>