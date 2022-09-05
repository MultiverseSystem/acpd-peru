<?php require_once "layouts/header.php"; ?>

<div class="container mb-5">
    <div class="">
        <div class="rounded d-flex justify-content-center">
            <div class="col-md-6 col-sm-12 shadow-lg p-5 bg-light mt-5">
                <div class="text-center">
                    <h3 class="text-primary">Iniciar sesión</h3>
                </div>
                <form class="form" action="model/login.php" method="POST">
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="Usuario" name="name">
                    </div>
                    <div class="input-group mb-3">

                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">
                        Iniciar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "layouts/footer.php"; ?>