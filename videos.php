<?php require_once "layouts/header.php"; ?>


<?php require_once "model/listar.php"; ?>

<div class="event padding--top padding--bottom bg-light">
    <div class="container">
        <div class="section__header text-center">
            <h2>Galería de Videos</h2>
        </div>
        <div class="section__wrapper">
            <div class="row g-4 justify-content-center">

                <?php $list = list_limit();
                $num = num_list();
                $equ = $num[0];
                $div = ceil($num[0] / 9); ?>





                <?php foreach ($list as $info) : ?>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <?php if (($info->categoria) == "youtube") : ?>
                            <div class="card">
                                <div class="card-header">
                                    <iframe height="180" src="<?php echo $info->modify ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="card-body">
                                    <ul class="event__metapost-info">
                                        <li><i class="far fa-clock"></i> <?php echo $info->publicacion ?></li>

                                    </ul>
                                    <h5><?php echo $info->titulo ?></h5>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (($info->categoria) == "facebook") : ?>
                            <div class="card">
                                <div class="card-header">
                                    <iframe src="<?php echo $info->modify ?>" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>

                                </div>
                                <div class="card-body">
                                    <ul class="event__metapost-info">
                                        <li><i class="far fa-clock"></i> <?php echo $info->publicacion ?></li>

                                    </ul>
                                    <h5><?php echo $info->titulo ?></h5>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>



            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                    <?php if (isset($_GET['num'])) {
                        $din = $_GET['num'];
                    } ?>

                    <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 0 ?>"><?php echo '<<'; ?></a></li>
                    <?php if (isset($_GET['num'])) : ?>
                        <?php if ($din <= $equ && $din >= 0) : ?>
                            <?php if ($din == $equ) : ?>
                                <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo $din - 8 ?>"><?php echo round($din - 1) / 9; ?></a></li>
                                <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo $din ?>"><?php echo round($din / 9); ?></a></li>
                            <?php elseif ($din <= $equ && $din >= 18) : ?>
                                <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo $din - 9 ?>"><?php echo round(($din - 9) / 9) + 1; ?></a></li>
                                <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo $din ?>"><?php echo round($din / 9) + 1; ?></a></li>
                                <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo $din + 9 ?>"><?php echo round(($din + 9) / 9) + 1; ?></a></li>
                            <?php else : ?>
                                <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 0 ?>"><?php echo 1; ?></a></li>
                                <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 9 ?>"><?php echo 2; ?></a></li>
                                <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 18 ?>"><?php echo 3; ?></a></li>
                            <?php endif; ?>
                        <?php else : ?>
                            <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 0 ?>"><?php echo 1; ?></a></li>
                            <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 9 ?>"><?php echo 2; ?></a></li>
                            <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 18 ?>"><?php echo 3; ?></a></li>

                        <?php endif; ?>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 0 ?>"><?php echo 1; ?></a></li>
                        <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 9 ?>"><?php echo 2; ?></a></li>
                        <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo 18 ?>"><?php echo 3; ?></a></li>
                    <?php endif; ?>

                    <li class="page-item"><a class="page-link" href="#"><?php echo '...'; ?></a></li>
                    <li class="page-item"><a class="page-link" href="videos.php?num=<?php echo $equ - 9 ?>"><?php echo $div; ?></a></li>


                </ul>

            </nav>

        </div>
    </div>
</div>



<!-- ================> Social section end here <================== -->
<?php require_once "layouts/apoyo.php"; ?>
<?php require_once "layouts/ubicacion.php"; ?>
<?php require_once "layouts/footer.php";  ?>