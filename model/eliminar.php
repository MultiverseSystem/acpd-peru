<?php 
$id = $_GET['id'];

include "database.php";
      // $sql = "SELECT * FROM login";
 
        $sql = "DELETE FROM content WHERE id='$id'";
        $conect = new Conexion();
        $result = $conect->Conectar();
        $execute = $result ->prepare($sql);
        $execute -> execute();
        $data = $execute->fetch(PDO::FETCH_OBJ);
        
        header('location:../admin.php');