<?php

require_once "conexion.php";

class VideoModel
{

    //crear video
    static public function mdlIngresarVideo($tabla, $datos)
    {

        $liveOld = false;
        $live = true;
        try {
            if ($datos['live'] == true) {
                $stmtLive = Conexion::conectar()->prepare("UPDATE $tabla SET live = :liveOld WHERE live = :live");
                $stmtLive->bindParam(":liveOld", $liveOld, PDO::PARAM_INT);
                $stmtLive->bindParam(":live", $live, PDO::PARAM_INT);
                $stmtLive->execute();
            }

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(links,titulo,dct,ptf,live,carpeta) VALUE(:link,:titulo,:dct,:ptf,:live,:carpeta)");
            $stmt->bindParam(":link", $datos['link'], PDO::PARAM_STR);
            $stmt->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
            $stmt->bindParam(":dct", $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":ptf", $datos['plataforma'], PDO::PARAM_STR);
            $stmt->bindParam(":live", $datos['live'], PDO::PARAM_STR);
            $stmt->bindParam(":carpeta", $datos['carpeta'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $stmt->close();
            $stmt = null;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    //mostrar lista de videos
    static public function mdlGetVideo($tabla, $item, $valor, $page, $carpeta)
    {
        try {
            if ($item != null) {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tabla.$item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->close();
            } else {

                $videoporPaginas = 9;
                $pagina = 1;

                if (isset($page)) {
                    $pagina = $page;
                }

                $limit = $videoporPaginas;
                $offset = ($pagina - 1) * $videoporPaginas;
                if ($carpeta == '') {
                    $stmt = Conexion::conectar()->prepare("SELECT count(*) as conteo FROM $tabla");
                } else {
                    $stmt = Conexion::conectar()->prepare("SELECT count(*) as conteo FROM $tabla WHERE carpeta = ?");
                    $stmt->bindParam(1, $carpeta, PDO::PARAM_STR);
                }

                $stmt->execute();
                $conteo = $stmt->fetch(PDO::FETCH_OBJ)->conteo;

                $paginas = ceil($conteo / $videoporPaginas);
                // return $paginas;
                if ($carpeta == '') {
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla order by id DESC LIMIT ? OFFSET ?");
                    $stmt->bindParam(1, $limit, PDO::PARAM_INT);
                    $stmt->bindParam(2, $offset, PDO::PARAM_INT);
                } else {
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE `carpeta` = ? order by id DESC LIMIT ? OFFSET ?");
                    $stmt->bindParam(1, $carpeta, PDO::PARAM_STR);
                    $stmt->bindParam(2, $limit, PDO::PARAM_INT);
                    $stmt->bindParam(3, $offset, PDO::PARAM_INT);
                }
                $stmt->execute();
                return ["videos" => $stmt->fetchAll(PDO::FETCH_OBJ), "paginas" => $paginas, "pagina_actual" => $pagina];
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    ///editar video
    static public function mdlEditarVideo($tabla, $datos, $id)
    {

        // return $datos[5]['live'];

        $live = false;
        try {
            if (isset($datos[5]['live'])) {

                $stmtLive = Conexion::conectar()->prepare("UPDATE $tabla SET live = :liveOld WHERE live = :live");
                $stmtLive->bindParam(":liveOld", $live, PDO::PARAM_INT);
                $stmtLive->bindParam(":live", $datos[5]['live'], PDO::PARAM_INT);
                $stmtLive->execute();
            }

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `live` = :live, `carpeta` = :carpeta, `links` = :links, `titulo` = :titulo, `dct` = :dct, `ptf` = :ptf WHERE `id` =:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            foreach ($datos as $value) {
                if (isset($value['live'])) {
                    $stmt->bindParam(":live", $value['live'], PDO::PARAM_INT);
                } else {
                    $stmt->bindParam(":live",  $live, PDO::PARAM_INT);
                }


                if (isset($value['link'])) {
                    $stmt->bindParam(":links", $value['link'], PDO::PARAM_STR);
                } else if (isset($value['carpeta'])) {
                    $stmt->bindParam(":carpeta", $value['carpeta'], PDO::PARAM_STR);
                } else if (isset($value['titulo'])) {
                    $stmt->bindParam(":titulo", $value['titulo'], PDO::PARAM_STR);
                } else if (isset($value['descripcion'])) {
                    $stmt->bindParam(":dct", $value['descripcion'], PDO::PARAM_STR);
                } else if (isset($value['plataforma'])) {
                    $stmt->bindParam(":ptf", $value['plataforma'], PDO::PARAM_STR);
                }
            }

            $stmt->execute();
            return "ok";
            $stmt->close();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    //eliminar video
    static public function mdlDestroy($tabla, $id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $tabla.id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return "ok";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    //mostrar video en vivo 
    static public function mdlVideoEnVivo($tabla)
    {
        try {
            $valor = true;
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE live = ?");
            $stmt->bindParam(1, $valor, PDO::PARAM_BOOL);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->close();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
