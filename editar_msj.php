<?php
session_start();
if ($_SESSION['permiso'] !== "es true") {
    header('location:index.php');
}
// if ($_SESSION['warning_msj'] == "false") {
//     $_SESSION['warning_msj'] == "true";
// }

?>
<?php require_once "layouts/header.php"; ?>
<?php require_once "model/database.php"; ?>
<?php

// $sql = "SELECT * FROM login";
$id = $_GET['id'];
$sql = "SELECT * FROM mensaje WHERE id = $id ";
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

                                                <form action="model/editar_msj.php" method="POST">


                                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                                    <div class="row g-3 align-items-center">
                                                        <label for="">Fecha: "<?php echo $data->fecha; ?>" (opcional)</label>
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

                                                    <label for="">Titulo</label>
                                                    <input type="text" name="titulo" placeholder="titulo" value="<?php echo $data->titulo; ?>" class="form-control">
                                                    <label for="">descripción</label>
                                                    <textarea class="form-control" name="descripcion" cols="30" rows="5"><?php echo $data->descripcion; ?></textarea>
                                                    <?php if ($_SESSION['warning_msj'] == "false") : ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            la fecha no esconcruente , el años esta limitado de (1900 - 3000)
                                                        </div>
                                                    <?php elseif ($_SESSION['warning_msj'] == "campo"): ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            llena los campos de la fecha
                                                        </div>

                                                    <?php endif; ?>
                                                
                                                    <button class="btn btn-success p-2" type="submit" onclick="return confirm('Seguro que quieres editarlo?')">enviar</button>

                                                    <button class="btn btn-danger p-2"><a href="admin_msj.php" class="text-white">volver </a> </button>
                                                    <?php $_SESSION['warning_msj'] = 'true'; ?> 
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