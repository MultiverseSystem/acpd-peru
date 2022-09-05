<?php require_once "layouts/header.php"; ?>

<!-- ================> Event section start here <================== -->
<div class="event padding--top padding--bottom bg-light">
    <div class="container">
        <div class="section__header text-center">
            <h2>PROGRAMAS</h2>
        </div>
        <div class="section__wrapper">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-sm-12 col-12">
                    <div class="event__item">
                        <div class="event__inner">
                            <div class="event__thumb">
                                <a href="galeria.php"><img src="assets/images/programas/1.jpg" alt="event thumb"></a>
                            </div>
                            <div>
                                <button class="accordion">MINISTERIO DE ALABANZA</button>
                                <div class="panel">
                                    <p>Ministerio que ayuda a formar futuros servidores en la alabanza, hermano responsable Giussepi.</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-5 col-12 ">
                    <div class="event__item">
                        <div class="event__inner">
                            <div class="event__thumb">
                                <a href="galeria.php"><img src="assets/images/programas/2.jpg" alt="event thumb"></a>

                            </div>

                            <div>
                                <button class="accordion">MINISTERIO DE MATRIMONIOS</button>
                                <div class="panel">
                                    <p>Preparando familias bendecidas por Cristo encargados pastor Rubén Cifuentes y Misionera Mariela de Cifuentes.
                                      
                                </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-5 col-12 ">
                    <div class="event__item">
                        <div class="event__inner">
                            <div class="event__thumb">
                                <a href="galeria.php"><img src="assets/images/programas/3.jpg" alt="event thumb"></a>

                            </div>

                            <div>
                                <button class="accordion">MINISTERIO DE DAMAS</button>
                                <div class="panel">
                                    <p>
                                    Formando mujeres, guerreras, valientes y esforzadas.
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="event__item">
                        <div class="event__inner">
                            <div class="event__thumb">
                                <a href="galeria.php"><img src="assets/images/programas/4.jpg"></a>
                            </div>

                            <div>
                                <button class="accordion">MINISTERIO DE VARONES</button>
                                <div class="panel">
                                    <p>
                                    Fortalecimiento de guerreros en Cristo encargado pastor Rubén Cifuentes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="event__item">
                        <div class="event__inner">
                            <div class="event__thumb">
                                <a href="galeria.php"><img src="assets/images/programas/5.jpg" alt="event thumb"></a>

                            </div>
                            <div>
                                <button class="accordion">MINISTERIO DE JÓVENES</button>
                                <div class="panel">
                                    <p>
                                    Este es uno de los ministerios más importante de nuestra iglesia manteniendo obras en las comunidades shipibas de la región Loreto y otros lugares encargado Dr. Rubén.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6 col-12" >
                    <div class="event__item">
                        <div class="event__inner">
                            <div class="event__thumb">
                                <a href="galeria.php"><img src="assets/images/programas/6.jpg" alt="event thumb"></a>

                            </div>
                            <div>
                                <button class="accordion">MINISTERIO DE NIÑOS</button>
                                <div class="panel">
                                    <p>
                                    Tenemos la escuela dominical los domingos 10.30-12.30 encargado Misionera Dora Córdova.    
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