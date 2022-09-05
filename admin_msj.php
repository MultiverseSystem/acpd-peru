<?php
session_start();
if ($_SESSION['permiso'] !== "es true") {
    header('location:index.php');
}
?>
<?php include "model/listar.php" ?>
<?php require_once "layouts/header.php"; ?>
<?php
if(isset($_GET['titulo'])){
    $buscar = $_GET['titulo'];
    $search = list_msj_buscar($buscar);
}

$list = list_msj_all();
?>

<div class="container" style="margin-top: 90px;">
<h2>Administración de mensajes</h2>
<div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        administrar
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="admin.php">videos</a></li>
        <li><a class="dropdown-item" href="admin_msj.php">mensajes</a></li>
    </ul>

</div>
<button class=" btn btn-success"><a style="color:white" href="model/session_msj.php">Agregar +</a></button>
<button class=" btn btn-success"><a style="color:white" href="admin_msj.php">mostrar todo</a></button>
<form action="admin_msj.php" method="GET">
    <div class="input-group" style="width:30% ; margin-top: 15px;">
        <input type="text" placeholder="Search" aria-label="Search" name="titulo">
        <input style="width:80px;" class="btn btn-primary" type="submit">
    </div>

</form>
<div class="mt-3"></div>

<?php if( isset($_GET['titulo']) ):?>
    <div>
    <table class="table table-success table-striped table-inverse table-responsive border border-3 border-primary">
        <thead class="thead-inverse">
            <tr>
                <th>id</th>
                <th>título</th>
                <th>publicación</th>
                <th>opciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($search as $ind) : ?>
                <tr>
                    <td><?php echo $ind->id ?></td>
                    <td><?php echo $ind->titulo ?></td>
                    <td><?php echo $ind->fecha ?></td>

                    <td>
                       <button class="btn btn-warning"> <a class="text-white" href="editar_msj.php?id=<?php echo $ind->id ?>">editar</a></button>
                       <button class="btn btn-danger"> <a class="text-white" href="model/eliminar_msj.php?id=<?php echo $ind->id ?>" onclick="return confirm('Seguro que quieres eliminarlo?')">eliminar</a></button>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php else:?>
<div>
    <table class="table table-success table-striped table-inverse table-responsive border border-3 border-primary">
        <thead class="thead-inverse">
            <tr>
                <th>id</th>
                <th>título</th>
                <th>publicación</th>
                <th>opciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $item) : ?>
                <tr>
                    <td><?php echo $item->id ?></td>
                    <td><?php echo $item->titulo ?></td>
                    <td><?php echo $item->fecha ?></td>

                    <td>
                    <button class="btn btn-warning"> <a class="text-white" href="editar_msj.php?id=<?php echo $ind->id ?>">editar</a></button>
                       <button class="btn btn-danger"> <a class="text-white" href="model/eliminar_msj.php?id=<?php echo $ind->id ?>" onclick="return confirm('Seguro que quieres eliminarlo?')">eliminar</a></button>
                          </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif;?>
</div>




<?php require_once "layouts/footer.php";  ?>