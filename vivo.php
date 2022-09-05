<?php require_once "layouts/header.php"; ?>
<?php require_once "model/listar.php"; ?>


<div class="contact padding--top padding--bottom bg-light">
        <div class="container">
            <div class="section__wrapper">
                <div class="contact__form">

                
        <div>
            <h1 class="text-center">EN VIVO</h1>
        </div>



    <div class="shedule__sunrise">
        <div class="shedule__sunrise-item">
            <div class="shedule__sunrise-inner" style="background-color: #2A0944;">
                <div class="shedule__sunrise-thumb">
                    <img src="assets/images/shedule/sun.png" alt="event sunrise">
                </div>
                <div class="shedule__sunrise-content">
                    <h3>HORARIO:</h3>
                    <P>______________________</P>

                </div>
            </div>
        </div>
        <div class="shedule__sunrise-item">
            <div class="shedule__sunrise-inner" style="background-color: #2A0944;">

                <div class="shedule__sunrise-content">
                    <h3 class="text-center">DOMINGO</h3>
                    <p>¡Inicia, Los domingos a las 10:30 am!</p>
                </div>
            </div>
        </div>
    </div>



    <div class="mx-auto mt-5">
        <div class="container col-lg-12 col-sm-12 col-12">
            <?php $live = list_live();

            foreach ($live as $vivo) : ?>
                <?php if (($vivo->categoria) == "youtube") : ?>
                    <div class="container">
                        <iframe height="500px" width="100%" src="<?php echo $vivo->modify ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div style="background-color:#3c5b95;margin-top:-6px;">
                            <h5 class="text-center text-white"><?php echo $vivo->titulo ?></h5>
                        </div>

                    </div>
                <?php endif; ?>

                <?php if (($vivo->categoria) == "facebook") : ?>
                    <div class="container">
                        <iframe src="<?php echo $vivo->modify ?>" height="700" width="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                        <div style="background-color:#3c5b95;margin-top:-6px;">
                            <h5 class="text-center text-white"><?php echo $vivo->titulo ?></h5>
                        </div>
                        <div style="background-color:#3c5b95;margin-top:-6px;">
                            <p class="text-center text-white"><?php echo $vivo->descripcion ?></p>
                        </div>


                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>


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
            
                </div> 
            </div>
        </div>
    </div>


<?php require_once "layouts/apoyo.php"; ?>
<?php require_once "layouts/ubicacion.php"; ?>
<?php require_once "layouts/footer.php";  ?>