<div class="container mt-3">
        <h1>Administracion de videos</h1>

        <div class="card">
            <div class="card-header">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarvideo">Agregar Video</button>


                <!-- Modal -->
                <div class="modal fade" id="agregarvideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" id="agregar-video">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="staticBackdropLabel">Agregar Video</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="link">Link (URL)</label>
                                    <input type="text" id="link" class="form-control mb-2">
                                    <label for="ptf">Plataforma</label>
                                    <select name="" id="ptf" class="form-control mb-2">
                                        <option value="" selected>-- Seleccione la plataforma --</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="youtube">Youtube</option>
                                    </select>

                                    <label for="carpeta">Carpeta</label>
                                    <select name="" id="carpeta" class="form-control mb-2">
                                        <option value="" selected>-- Seleccione la carpeta --</option>
                                        <option value="Prédica">Prédica</option>
                                        <option value="Reunión">Reunión</option>
                                        <option value="Mensaje">Mensaje</option>
                                        <option value="Otros">Otros</option>
                                    </select>

                                    <label for="tt">Titulo (Opcional)</label>
                                    <input type="text" id="tt" class="form-control mb-2">
                                    <label for="dct">Descripción (Opcional)</label>
                                    <input type="text" id="dct" class="form-control mb-2">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="envivo">
                                        <label class="form-check-label" for="envivo">
                                            VIDEO TRANSMITIDO EN VIVO
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </form>
                            <div id="alerta-video">

                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Link</th>
                            <th>Titulo</th>
                            <th>Plataforma</th>
                            <th>Carpeta</th>
                            <th>Fecha</th>
                            <th>En vivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="videoList">

                    </tbody>
                </table>
                <div>
                    <button type="button" id="at" class="btn btn-primary btn-sm">Atras</button> pagina
                    <input type="number" id="pageVideos" value="1" style="width: 30px;">
                    <span id="totalPaginas"></span>
                    <button type="button" id="sg" class="btn btn-primary btn-sm">Siguiente</button>
                </div>
            </div>
        </div>





    </div>