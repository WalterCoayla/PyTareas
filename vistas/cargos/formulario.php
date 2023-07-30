<?php
$id = isset ($cargo['id'])?$cargo['id']:"";
$nombre = isset ($cargo['cargo'])?$cargo['cargo']:"";
$descripcion = isset ($cargo['descripcion'])?$cargo['descripcion']:"";

$editar = ($id != '')?1:0;  # 1: Editar / 0: Nuevo

$titulo = ($editar==1)?'Editar Cargo':'Nuevo Cargo';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <h1><?=$titulo?></h1>
    <form action="?ctrl=CtrlCargo&accion=guardar" method="post">
        id: <input class="form-control" type="text" name="id" value="<?=$id?>" readonly>
        <br>
        Nombre: <input class="form-control" type="text" name="nombre" value="<?=$nombre?>">
        <br>
        Descripcion: <input class="form-control" type="text" name="descripcion" value="<?=$descripcion?>">
        <br>
        <input class="form-control bg-primary" type="submit" value="Guardar">
    </form>

    <a href="?ctrl=CtrlCargo">Retornar</a>
</body>
</html>