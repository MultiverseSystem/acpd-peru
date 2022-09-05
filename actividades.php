<?php require_once "layouts/header.php"; ?>

<!-- ================> Event section start here <================== -->
<div class="event padding--top padding--bottom bg-light">
    <div class="container">
        <div class="section__header text-center">
            <h2>ACTIVIDADES</h2>
        </div>
        <div class="section__wrapper">
            
            <div class="row  justify-content-center">
                
                <div class="col-lg-4 col-sm-12 col-12 mb-5">
                    <div class="event__item">
                        <div class="event__inner">
                            <a href="galeria.php">
                            <div class="contenedor1">
                                <img src="assets/images/actividades/5.jpg" />
                                <div class="centrado1 fs-4 text-white">CAMPAÑA EVANGELISTICA MÉDICA</div>
                            </div>
                            </a>

                            <div>
                                <button class="accordion">CAMPAÑA EVANGELISTICA MÉDICA</button>
                                <div class="panel">
                                    <p>Con esta actividad tratamos de atender la salud física y espiritual en lugares donde hay carencia de estos servicios. Encargado: Pastor Rubén Cifuentes.</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-5 col-12 ">
                    <div class="event__item">
                        <div class="event__inner">
                            <a href="galeria.php">
                            <div class="contenedor1">
                                <img src="assets/images/actividades/4.jpg" />
                                <div class="centrado1 fs-3 text-white">CAMPAÑA NAVIDEÑAS</div>
                            </div>
                            </a>
                            <div>
                                <button class="accordion">CAMPAÑA NAVIDEÑAS</button>
                                <div class="panel">
                                    <p>Está es una hermosa actividad que se dedica alegrar a los niños en esta fecha con regalos, chocolatada y una fiesta especial, en lugares de mayor necesidad. Encargada hermana Dora.

                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-5 col-12 ">
                    <div class="event__item">
                        <div class="event__inner">
                            <a href="galeria.php">
                            <div class="contenedor1">
                                <img src="assets/images/actividades/3.jpg" />
                                <div class="centrado1 fs-2 text-white">CAMPAÑA MISIONERA</div>
                            </div>
                            </a>
                            <div>
                                <button class="accordion">CAMPAÑA MISIONERA</button>
                                <div class="panel">
                                    <p>
                                    Esta actividad se realiza a través de viajes misioneros, teniendo 2 objetivos la de evangelizar y preparar futuros misioneros. Encargado team misionero. 
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="event__item">
                        <div class="event__inner">
                            <a href="galeria.php">
                             <div class="contenedor1">
                                <img src="assets/images/actividades/1.jpg" />
                                <div class="centrado1 fs-2 text-white">ESTUDIO BÍBLICO</div>
                            </div>
                            </a>
                            <div>
                                <button class="accordion">ESTUDIO BÍBLICO</button>
                                <div class="panel">
                                    <p>
                                    Es un área muy importante para el crecimiento espiritual.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="event__item">
                        <div class="event__inner">
                            <a href="galeria.php">
                            <div class="contenedor1">
                                <img src="assets/images/actividades/2.jpg" />
                                <div class="centrado1 fs-2 text-white">REUNIÓN DE AYUNO Y ORACIÓN</div>
                            </div>
                            </a>
                            <div>
                                <button class="accordion">REUNIÓN DE AYUNO Y ORACIÓN</button>
                                <div class="panel">
                                    <p>
                                    En estas reuniones son para el fortalecimiento espiritual de los hermanos.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>


<!-- ================> Event section end here <================== -->



<?php require_once "layouts/apoyo.php"; ?>
<?php require_once "layouts/ubicacion.php"; ?>
<?php require_once "layouts/footer.php";  ?>