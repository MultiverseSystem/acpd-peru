<?php
       include "database.php";
      // $sql = "SELECT * FROM login";
 
       
        function list_limit(){
   
          $start=isset($_GET['num']) ? $_GET['num'] : 0 ;
         
          $sql = "SELECT * FROM content ORDER BY publicacion DESC LIMIT $start,9;";
          $conect = new Conexion();
          $result = $conect->Conectar();
          $execute = $result ->prepare($sql);
          $execute -> execute();
          return $data = $execute->fetchAll(PDO::FETCH_OBJ);
        }

        function list_live(){
          $sql = "SELECT * FROM content ORDER BY opcion desc LIMIT 0,1;";
          $conect = new Conexion();
          $result = $conect->Conectar();
          $execute = $result ->prepare($sql);
          $execute -> execute();
          return $data = $execute->fetchAll(PDO::FETCH_OBJ);
        }

        function num_list(){
          $sql = "SELECT COUNT(*) FROM content ";
          $conect = new Conexion();
          $result = $conect->Conectar();
          $execute = $result ->prepare($sql);
          $execute -> execute();
          return $data = $execute->fetch(PDO::FETCH_NUM);
        }



        function list_all(){
      
          $sql = "SELECT * FROM content ORDER BY id DESC";
          $conect = new Conexion();
          $result = $conect->Conectar();
          $execute = $result ->prepare($sql);
          $execute -> execute();
          return $data = $execute->fetchAll(PDO::FETCH_OBJ);
        }

        function list_msj_all(){
      
          $sql = "SELECT * FROM mensaje ORDER BY id DESC";
          $conect = new Conexion();
          $result = $conect->Conectar();
          $execute = $result ->prepare($sql);
          $execute -> execute();
          return $data = $execute->fetchAll(PDO::FETCH_OBJ);
        }

        function list_msj_buscar($b){
      
          $sql = "SELECT * FROM mensaje WHERE titulo LIKE '%$b%'";
          $conect = new Conexion();
          $result = $conect->Conectar();
          $execute = $result ->prepare($sql);
          $execute -> execute();
          return $data = $execute->fetchAll(PDO::FETCH_OBJ);
        }

        function list_buscar($b){
      
          $sql = "SELECT * FROM content WHERE titulo LIKE '%$b%'";
          $conect = new Conexion();
          $result = $conect->Conectar();
          $execute = $result ->prepare($sql);
          $execute -> execute();
          return $data = $execute->fetchAll(PDO::FETCH_OBJ);
        }



