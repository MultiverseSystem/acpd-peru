<?php require_once "layouts/header.php"; ?>



<div class="gallery padding--top padding--bottom bg-light">
    <div class="container">

        <div class="section__header text-center">
            <h2>Galería de Videos</h2>
        </div>
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-md-7">
                <div class="d-flex justify-content-evenly">
                    <button id="all-list-video" value="" class="btn btn-primary rounded-0">Todo</button>
                    <button id="all-predica-video" value="Prédica" class="btn btn-secondary rounded-0">Predica</button>
                    <button id="all-reunion-video" value="Reunión" class="btn btn-secondary rounded-0">Reunión</button>
                    <button id="all-mensaje-video" value="Mensaje" class="btn btn-secondary rounded-0">Mensaje</button>
                    <button id="all-otros-video" value="Otros" class="btn btn-secondary rounded-0">Otros</button>
                </div>
            </div>
        </div>

        <div class="row g-3" id="videos-lista"></div>

        <div class="mt-5">
            <button type="button" id="at" class="btn btn-primary btn-sm">Atras</button> pagina
            <input type="number" id="pageVideos" value="1" style="width: 30px;">
            <span id="totalPaginas"></span>
            <button type="button" id="sg" class="btn btn-primary btn-sm">Siguiente</button>
        </div>

    </div>
</div>


<?php require_once "layouts/apoyo.php" ?>
<?php require_once "layouts/footer.php";  ?>