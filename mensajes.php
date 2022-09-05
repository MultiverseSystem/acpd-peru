<?php require_once "layouts/header.php"; ?>
<?php require_once "model/listar.php"; ?>
<?php $listar = list_msj_all() ?>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="event padding--top padding--bottom bg-light">
    <div class="container">
        <div class="section__header text-center">
            <h2>Predicamento</h2>
         </div>
        <div class="section__wrapper">
            <div class="row g-4 justify-content-center">
                <?php foreach ($listar as $item) : ?>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5><?php echo $item->titulo ?></h5>
                            </div>
                            <div class="card-body">
                                <!-- <ul class="event__metapost-info">
                                    <li><i class="far fa-clock"></i> 10am - 12pm</li>
                                    <li><i class="fas fa-map-marker-alt"></i> PO Box 16122, Collins Street</li>
                                </ul> -->
                                <p class="ocultar"><?php echo $item->descripcion ?></p>
                        
                             </div>
                        </div>
                  
                    </div>
                         
                <?php endforeach; ?>

        
            </div>

        </div>
    </div>
</div>



</script>
<?php require_once "layouts/footer.php"; ?>

