<?php
session_start();
if ($_SESSION['permiso'] !== "es true") {
    header('location:index.php');
}
?>
<?php include "model/listar.php" ?>
<?php require_once "layouts/header.php"; ?>
<?php
if (isset($_GET['titulo'])) {
    $buscar = $_GET['titulo'];
    $search = list_buscar($buscar);
}
$list = list_all();
$vivo = list_live();
?>


<div class="container"  style="margin-top: 90px;">
    <h2>Administración de videos</h2>

    <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            administrar
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="admin.php">videos</a></li>
            <li><a class="dropdown-item" href="admin_msj.php">mensajes</a></li>
        </ul>
    </div>

    <button class=" btn btn-success"><a style="color:white" href="model/session.php">Agregar +</a></button>
    <?php if ($_GET['fvideo'] == "si") : ?>
        <button class=" btn btn-warning"><a style="color:white" href="admin.php">volver</a></button>
    <?php else : ?>
        <button class=" btn btn-warning"><a style="color:white" href="admin.php?fvideo=si">Filtro - videos en vivo</a></button>
    <?php endif; ?>

    <form action="admin.php" method="GET">
        <div class="input-group" style="width:30% ; margin-top: 15px;">
            <input type="text" placeholder="Search" aria-label="Search" name="titulo">
            <input style="width:80px;" class="btn btn-primary" type="submit">
        </div>

    </form>

    <div class="mt-3"></div>
    <?php if (!isset($_GET['titulo']) && !isset($_GET['fvideo'])) : ?>
        <div>
            <table class="table table-success table-striped table-inverse table-responsive border border-3 border-primary">
                <thead class="thead-inverse">
                    <tr>
                        <th>id</th>
                        <th>links</th>
                        <th>título</th>
                        <th>categoría</th>
                        <th>publicado</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $info) : ?>
                        <tr>
                            <td><?php echo $info->id ?></td>
                            <td><?php echo $info->links ?></td>
                            <td><?php echo $info->titulo ?></td>
                            <td><?php echo $info->categoria ?></td>
                            <td><?php echo $info->publicacion ?></td>
                            <td>
                                <button class="btn btn-warning"><a class="text-white" href="editar.php?id=<?php echo $info->id ?>">editar</a></button>
                                <button class="btn btn-danger"><a class="text-white" href="model/eliminar.php?id=<?php echo $info->id ?>" onclick="return confirm('Seguro que quieres eliminarlo?')">eliminar</a></button>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php elseif ($_GET['fvideo'] == "si") : ?>
        <div>
            <table class="table table-success table-striped table-inverse table-responsive border border-3 border-primary">
                <thead class="thead-inverse">
                    <tr>
                        <th>id</th>
                        <th>links</th>
                        <th>título</th>
                        <th>categoría</th>
                        <th>publicado</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vivo as $item) : ?>
                        <tr>
                            <td><?php echo $item->id ?></td>
                            <td><?php echo $item->links ?></td>
                            <td><?php echo $item->titulo ?></td>
                            <td><?php echo $item->categoria ?></td>
                            <td><?php echo $item->publicacion ?></td>
                            <td>
                                <button class="btn btn-warning"><a class="text-white" href="editar.php?id=<?php echo $info->id ?>">editar</a></button>
                                <button class="btn btn-danger"><a class="text-white" href="model/eliminar.php?id=<?php echo $info->id ?>" onclick="return confirm('Seguro que quieres eliminarlo?')">eliminar</a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php elseif ($_GET['titulo'] == $buscar) : ?>
        <div>
            <table class="table table-success table-striped table-inverse table-responsive border border-3 border-primary">
                <thead class="thead-inverse">
                    <tr>
                        <th>id</th>
                        <th>links</th>
                        <th>título</th>
                        <th>categoría</th>
                        <th>publicado</th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($search as $busc) : ?>
                        <tr>
                            <td><?php echo $busc->id ?></td>
                            <td><?php echo $busc->links ?></td>
                            <td><?php echo $busc->titulo ?></td>
                            <td><?php echo $busc->categoria ?></td>
                            <td><?php echo $busc->publicacion ?></td>
                            <td>
                                <button class="btn btn-warning"><a class="text-white" href="editar.php?id=<?php echo $info->id ?>">editar</a></button>
                                <button class="btn btn-danger"><a class="text-white" href="model/eliminar.php?id=<?php echo $info->id ?>" onclick="return confirm('Seguro que quieres eliminarlo?')">eliminar</a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    <?php endif; ?>

</div>


<?php require_once "layouts/footer.php";  ?>