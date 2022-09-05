<!-- <section style="margin-left:70px ;" class="m-5">
    <div class="row container">



        <hr>
        <h3>Videos subidos:</h3>
        <?php $list = list_limit();
        $num = num_list();
        $equ = $num[0];

        $div = ceil($num[0] / 9);

        foreach ($list as $info) : ?>
            <?php if (($info->categoria) == "youtube") : ?>
                <div class="col-lg-4 col-sm-6 col-12 p-3  justify-content-center">
                    <iframe height="180" src="<?php echo $info->modify ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                    <h5><?php echo $info->titulo ?></h5>
                </div>
            <?php endif; ?>
            <?php if (($info->categoria) == "facebook") : ?>
                <div class="col-lg-4 col-sm-6 col-12 p-3 justify-content-center">
                    <iframe src="<?php echo $info->modify ?>" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                    <h5><?php echo $info->titulo ?></h5>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>




    </div>
</section>
 -->
































 <?php
include "database.php";
$id = $_POST['id'];
$links = $_POST['links'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$opcion = $_POST['opcion'];


$filter1 = "https://www.youtube.com/watch?v=";
$filter2 = "https://www.youtube.com/embed/";

$filter3 = "https://www.facebook.com/IglepueblodeDios/videos/"; 
$filter4 = "https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FIglepueblodeDios%2Fvideos%2F";
$plus = "&show_text=false&t=0";
        
if($categoria == "youtube"){
    if(strncmp($filter1, $links, 32) === 0){
        $catch = substr($links,32,20);
        $mod = "$filter2$catch";
        if($opcion == 1){
          $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria',opcion=CURRENT_TIMESTAMP() WHERE id='$id'";
        }else{
          $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria' WHERE id='$id'";
        }
        $conect = new Conexion();
        $result = $conect->Conectar();
        $execute = $result ->prepare($sql);
        $execute -> execute();
        $data = $execute->fetch(PDO::FETCH_OBJ);
        header('location:../editar.php?id='.$id);
        
    }else{
      echo "no es el linik correcto de youtube";
        // $_SESSION['warning']=$categoria;
        // header("location:../registrar.php");
    }
}elseif($categoria == "facebook"){
    if(strncmp($filter3, $links, 49) === 0){
        $catch = substr($links,49,40);
        $mod = "$filter4$catch$plus";
        if($opcion == 1){
          $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria',opcion=CURRENT_TIMESTAMP() WHERE id='$id'";
        }else{
          $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria' WHERE id='$id'";
        }
        $conect = new Conexion();
        $result = $conect->Conectar();
        $execute = $result ->prepare($sql);
        $execute -> execute();
        $data = $execute->fetch(PDO::FETCH_OBJ);
        
        header('location:../editar.php?id='.$id);

 
    }else{
      echo "no es el linik correcto de youtube";
        // $_SESSION['warning']= $categoria ;
        // header("location:../registrar.php");
    }

}else{
    echo "no estas usando las redes correctas";
}

