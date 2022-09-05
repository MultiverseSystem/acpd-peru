<?php
session_start();
if ($_SESSION['permiso'] !== "es true") {
    header('location:index.php');
}
?>
<?php require_once "layouts/header.php"; ?>

<body>
    <div class="container m-5 ">
        <h1 class="text-center">Agregar Video</h1>
        <div class="col-lg-6 col-sm-8 col-9 mx-auto">
            <form action="model/registro.php" method="POST">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="opcion">
                        <!-- <option selected>elegir</option> -->
                        <option value="0">Video</option>
                        <option value="1">En vivo</option>
                    </select>
                    <label for="floatingSelect">tipo de publicación</label>
                </div>
                <div class="mt-3"></div>

                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="categoria">
                        <!-- <option selected>elegir</option> -->
                        <option value="facebook">facebook</option>
                        <option value="youtube">youtube</option>         
                    </select>
                    <label for="floatingSelect">Redes sociales</label>
                </div>

                <div class="mt-3"></div>
                <input type="text" placeholder="links (obligatorio)" name="links" class="form-control" required>
                <input type="text" placeholder="titulo (opcional)" name="titulo" class="form-control">
                <input type="text" placeholder="descripcion (opcional)" name="descripcion" class="form-control">

                <?php if ($_SESSION['warning'] == "youtube") : ?>
                    <div class="alert alert-danger" role="alert">
                    Solo se acepta links de Youtube
                    </div>
                <?php elseif ($_SESSION['warning'] == "facebook") : ?>
                    <div class="alert alert-danger" role="alert">
                    Solo se acepta links de Facebook - "Iglesia Cristiana Pueblo de Dios" 
                    </div>
                <?php elseif ($_SESSION['warning'] == "true") : ?>
                    <div class="alert alert-success" role="alert">
                    Se registró correctamente
                    </div>
                <?php else:?>

                <?php endif; ?>

                <input type="submit" style="margin-left: 25%;">




            </form>
        </div>
    </div>

</body>

</html>
<?php require_once "layouts/footer.php"; ?>