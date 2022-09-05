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
    <div class="cause cause-style2">
        <div class="container">
            <div class="section__wrapper">
                <div class="row g-4">

                    <div class="col-lg-6 col-12">
                        <div class="cause__item">
                            <div class="cause__inner">
                                <div class="cause__content">
                                    <div class="cause__bars">
                                        <div class="donaterange__content">
                                            <div class="container border border-5 border-warning">

                                                <form class=" flex-wrap justify-content-between row" id="contact-form-acdp" method="post">
                                                    <h2 class="mb-5 mt-5">Infórmanos</h2>
                                                    <input class="w-80" type="text" placeholder="Nombre" id="nombre" name="name">
                                                    <input type="email" placeholder="Email" id="email" name="email" >
                                                    <input class="w-80" type="text" placeholder="Asunto" id="asunto" name="subject">
                                                    <textarea placeholder="Mensaje" rows="8" name="message" id="mensaje"></textarea>
                                                    <div id="alert-ctz">

                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="default-btn move-right"><span>Enviar ahora</span></button>
                                                    </div>
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
                                            <div class="location__right padding--top padding--bottom">
                                                <div class="location__info">
                                                    <div class="location__info-top ">

                                                        <div class="d-flex justify-content-center pe-5">
                                                            <div class="location__info-thumb">
                                                                <img src="assets/images/about/logoSVG.svg" alt="location thumb" style="height: 190px;">
                                                            </div>
                                                        </div>
                                                        <div class="text-center pe-5 mt-3">
                                                            <h6 class="text-white">IGLESIA CRISTIANA</h6>
                                                            <h6 class="text-white">PUEBLO DE DIOS</h6>
                                                        </div>
                                                    </div>
                                                    <div class="location__info-bottom">
                                                        <div class="section__header">
                                                            <h2>Información de contacto</h2>
                                                        </div>
                                                        <div class="section__wrapper">
                                                            <div class="location__info-list">
                                                                <ul>
                                                                    <li>
                                                                        <div class="location__info-left">
                                                                            <i class="fas fa-map-marker-alt"></i>
                                                                        </div>
                                                                        <div class="location__info-right">
                                                                            <p>Jr. Bello Horizonte 1337 - San Martin De Porres - Lima, Lima</p>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="location__info-left">
                                                                            <i class="fas fa-phone"></i>
                                                                        </div>
                                                                        <div class="location__info-right">
                                                                            <p>+51 944 447 904</p>
                                                                        </div>
                                                                    </li>

                                                                </ul>
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
                </div>
            </div>
        </div>
    </div>
<!--     
    <div class="container ">
        <div class="col-lg-12 col-12 row">

            <div class="col-lg-6 col-6 ">
                <div class="location__left ">
                    <div class="section__wrapper">

                        <div class="container border border-5 border-warning">

                            <form class=" flex-wrap justify-content-between row" id="contact-form-acdp" method="post">
                                <h2 class="mb-5 mt-5">Infórmanos</h2>
                                <input class="w-80" type="text" placeholder="Nombre" id="nombre" name="name" required="required">
                                <input type="email" placeholder="Email" id="email" name="email" required>
                                <input class="w-80" type="text" placeholder="Asunto" id="asunto" name="subject">
                                <textarea placeholder="Mensaje" rows="8" name="message" id="mensaje"></textarea>
                                <div id="alert-ctz">

                                </div>
                                <div class="text-center w-100">
                                    <button type="submit" class="default-btn move-right"><span>Enviar ahora</span></button>
                                </div>


                            </form>
                            <p class="form-message"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-6">
                <div class="location__right padding--top padding--bottom">
                    <div class="location__info">
                        <div class="location__info-top ">

                            <div class="d-flex justify-content-center pe-5">
                                <div class="location__info-thumb">
                                    <img src="assets/images/about/logoSVG.svg" alt="location thumb" style="height: 190px;">
                                </div>
                            </div>
                            <div class="text-center pe-5 mt-3">
                                <h6 class="text-white">IGLESIA CRISTIANA</h6>
                                <h6 class="text-white">PUEBLO DE DIOS</h6>
                            </div>
                        </div>
                        <div class="location__info-bottom">
                            <div class="section__header">
                                <h2>Contact Info</h2>
                            </div>
                            <div class="section__wrapper">
                                <div class="location__info-list">
                                    <ul>
                                        <li>
                                            <div class="location__info-left">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="location__info-right">
                                                <p>Jr. Bello Horizonte 1337 - San Martin De Porres - Lima, Lima</p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="location__info-left">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div class="location__info-right">
                                                <p>+51 944 447 904</p>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->

    <!-- ================> Location section end here <================== -->


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

<?php require_once "layouts/ubicacion.php"; ?>
<?php require_once "layouts/footer.php"; ?>