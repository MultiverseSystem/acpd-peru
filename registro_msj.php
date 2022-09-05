<?php
session_start();
if ($_SESSION['permiso'] !== "es true") {
    header('location:index.php');
}
?>
<?php require_once "layouts/header.php"; ?>

<body>
    <div class="container m-5 ">
        <h1 class="text-center">Agregar Mensaje</h1>
        <div class="col-lg-6 col-sm-8 col-9 mx-auto">
            <form action="model/registro_msj.php" method="POST">
               
            
                <div class="mt-3"></div>
                <label for="">Título</label>
                <input type="text" name="titulo" class="form-control" required>
                <label for="">Descripción</label>
                <textarea name="descripcion" id="" cols="30" rows="10" required></textarea>
        

                <input type="submit" style="margin-left: 25%;">


            </form>
        </div>
    </div>

</body>

</html>
<?php require_once "layouts/footer.php"; ?>