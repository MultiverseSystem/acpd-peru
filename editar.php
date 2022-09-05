<?php
session_start();
if ($_SESSION['permiso'] !== "es true") {
    header('location:index.php');
}


?>
<?php require_once "layouts/header.php"; ?>
<?php require_once "model/database.php"; ?>
<?php

// $sql = "SELECT * FROM login";
$id = $_GET['id'];
$sql = "SELECT * FROM content WHERE id = $id ";
$conect = new Conexion();
$result = $conect->Conectar();
$execute = $result->prepare($sql);
$execute->execute();
$data = $execute->fetch(PDO::FETCH_OBJ);

?>


<body>



    <div class="cause cause-style2 mb-5">
        <div class="container">
            <div class="section__wrapper">

                <div class="row g-4">

                    <div class="col-lg-6 col-12">
                        <div class="cause__item">
                            <div class="cause__inner">
                                <div class="cause__content">
                                    <div class="cause__bars">
                                        <div class="donaterange__content">
                                            <div class="container ">
                                                <h3 style="color:black;" class="mt-3">Editar información</h3>

                                                <form action="model/editar.php" method="POST">

                                                    <div class="form-floating">
                                                 
                                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="opcion">
                                                            <!-- <option selected>elegir</option> -->
                                                            <option value="0">video</option>
                                                            <option value="1">en vivo</option>
                                                        </select>
                                                        <label for="floatingSelect">tipo de publicación</label>
                                                    </div>
                                                    <div class="mt-3"></div>

                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="categoria">
                                                            <!-- <option selected>elegir</option> -->
                                                            <?php if (($data->categoria) == "facebook") : ?>
                                                                <option value="facebook">facebook</option>
                                                                <option value="youtube">youtube</option>
                                                            <?php elseif (($data->categoria) == "youtube") : ?>
                                                                <option value="youtube">youtube</option>
                                                                <option value="facebook">facebook</option>
                                                            <?php endif; ?>

                                                        </select>
                                                        <label for="floatingSelect">Redes sociales</label>
                                                    </div>

                                                    <div class="mt-3"></div>
                                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

                                                    <div class="row g-3 align-items-center">
                                                        <label for="">Fecha: "<?php echo $data->publicacion; ?>" (opcional)</label>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control" placeholder="dia" name="day" minlength="1" maxlength="2">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control" placeholder="mes" name="month" minlength="1" maxlength="2">
                                                        </div>
                                                        <div class="col-2">
                                                            <input type="text" class="form-control" placeholder="año" name="year" minlength="4" maxlength="4">
                                                        </div>
                                                    </div>




                                                    <label for="">Links(URL)</label>
                                                    <input type="text" name="links" placeholder="Links" value="<?php echo $data->links; ?>" class="form-control" required>
                                                    <label for="">Título</label>
                                                    <input type="text" name="titulo" placeholder="titulo" value="<?php echo $data->titulo; ?>" class="form-control">
                                                    <label for="">descripción</label>
                                                    <textarea class="form-control" name="descripcion" cols="30" rows="2"><?php echo $data->descripcion; ?></textarea>

                                                    <?php if ($_SESSION['warning'] == "youtube") : ?>
                                                        <div class="alert alert-danger" role="alert">
                                                        Solo acepta links de YouTube 
                                                        </div>
                                                    <?php elseif ($_SESSION['warning'] == "facebook") : ?>
                                                        <div class="alert alert-danger" role="alert">
                                                        Solo acepta links de Facebook
                                                        </div>

                                                    <?php endif; ?>

                                                    <?php if ($_SESSION['warning_date'] == "false") : ?>
                                                        <div class="alert alert-danger" role="alert">
                                                        La fecha no concuerda, solo acepta números y el año está limitado de (1900 - 3000)
                                                        </div>
                                                    <?php elseif ($_SESSION['warning_date'] == "campo"): ?>
                                                        <div class="alert alert-danger" role="alert">
                                                        Llena los campos de la fecha o déjelo vacío.
                                                        </div>

                                                    <?php endif; ?>

                                                    <button class="btn btn-success p-2" type="submit" onclick="return confirm('Seguro que quieres editarlo?')">enviar</button>

                                                    <button class="btn btn-danger p-2"><a href="admin.php" class="text-white">volver </a> </button>

                                                    <?php  ($_SESSION['warning'] = "true") ?>
                                                    <?php  ($_SESSION['warning_date'] = "true") ?>
                                                </form>

                                                <p class="form-message"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="cause__item">
                            <div class="cause__inner">
                                <div class="cause__content">
                                    <div class="cause__bars">
                                        <div class="donaterange__content">
                                            <div class="container">
                                                <h3 style="color:black;" class="mt-3">Previsualización</h3>



                                                <?php if (($data->categoria) == "youtube") : ?>
                                                    <div class="container">
                                                        <iframe height="200px" width="100%" src="<?php echo $data->modify ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        <div style="background-color:#3c5b95;padding-left:10px ;">
                                                            <P class="text-white">FECHA:<?php echo $data->publicacion ?></P>
                                                        </div>
                                                        <div style="background-color:#3c5b95;padding-left:10px ;">
                                                            <h5 class="text-white">TITULO:<?php echo $data->titulo ?></h5>
                                                        </div>
                                                        <div style="background-color:#3c5b95;padding-left:10px ;">
                                                            <P class="text-white">DESCRIPCIÓN:<?php echo $data->descripcion ?></P>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (($data->categoria) == "facebook") : ?>
                                                    <div class="container">
                                                        <iframe src="<?php echo $data->modify ?>" height="300" width="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                                                        <div style="background-color:#3c5b95;padding-left:10px ;">
                                                            <p class="text-white">FECHA:<?php echo $data->publicacion ?></p>
                                                        </div>
                                                        <div style="background-color:#3c5b95;padding-left:10px ;">
                                                            <h5 class="text-white">TITULO:<?php echo $data->titulo ?></h5>
                                                        </div>
                                                        <div style="background-color:#3c5b95;padding-left:10px ;">
                                                            <P class="text-white">DESCRIPCIÓN:<?php echo $data->descripcion ?></P>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




</body>

</html>
<?php require_once "layouts/footer.php"; ?>