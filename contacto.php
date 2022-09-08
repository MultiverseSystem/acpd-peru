<?php require_once "layouts/header.php"; ?>
<main>
    <!-- ================> Contact section start here <================== -->
    <div class="contact m-5">
        <div class="container">
            <div class="section__header text-center">
                <h2>Contacta con nosotros</h2>
            </div>

        </div>
    </div>
    <!-- ================> Contact section end here <================== -->


    <!-- ================> Location section start here <================== -->

    <section class="container d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form id="enviar-formulario">
                        <input type="text" placeholder="Nombre" class="form-control" id="nombre" name="name">
                        <input type="email" placeholder="Correo Electrónico" class="form-control" id="correo" name="correo">
                        <input type="text" placeholder="Asunto" class="form-control" id="asunto" name="asunto">
                        <textarea class="form-control" placeholder="Escriba su mensaje" cols="30" rows="10" name="mensaje" id="mensaje"></textarea>
                        <div class="text-center d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block p-2">Enviar Mensaje</button>
                        </div>
                        <div id="alerta-contacto" class="mt-2">
                           
                         
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- ================> Social section start here <================== -->
    <div class="social">
        <div class="container">
            <div class="social__area">
                <ul class="social__list">
                    <li class="social__list-facebook">
                        <a href="https://www.facebook.com/IglepueblodeDios/" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook-f"></i>
                            <span>facebook</span>
                        </a>
                    </li>
                    <li class="social__list-twitter">
                        <a href="https://twitter.com/ICPDIOS?t=L0Uq0uG2Xky37NdFHpctiA&s=09://twitter.com/wpzoom" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-twitter"></i>
                            <span>twitter</span>
                        </a>
                    </li>
                    <li class="social__list-instagram">
                        <a href="https://www.youtube.com/channel/UCnQONrNqMllwQdF681fUMYA" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-youtube"></i>
                            <span>youtube</span>
                        </a>
                    </li>
                    <li class="social__list-instagram">
                        <a href="https://www.instagram.com/iglesiacristianapueblodedios/?hl=es" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                            <span>instagram</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <!-- ================> Social section end here <================== -->

</main>
<?php require_once "layouts/footer.php"; ?>