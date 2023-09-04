<?php
$id = isset ($empleado['id'])?$empleado['id']:"";
$nombre = isset ($empleado['nombres'])?$empleado['nombres']:"";
$apellido = isset ($empleado['apellidos'])?$empleado['apellidos']:"";
$email = isset ($empleado['email'])?$empleado['email']:"";
$cargoId= isset ($empleado['cargos_id'])?$empleado['cargos_id']:"";
$departamentoId= isset ($empleado['departamentos_id'])?$empleado['departamentos_id']:"";

$editar = ($id != '')?1:0;  # 1: Editar / 0: Nuevo

$titulo = ($editar==1)?'Editar Empleado':'Nuevo empleado';

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
    <form action="?ctrl=Ctrlempleado&accion=guardar" method="post">
        id: <input class="form-control" type="text" name="id" value="<?=$id?>" readonly>
        <br>
        Nombres: <input class="form-control" type="text" name="nombre" value="<?=$nombre?>">
        <br>
        Apellidos: <input class="form-control" type="text" name="apellido" value="<?=$apellido?>">
        <br>
        Email: <input class="form-control" type="text" name="email" value="<?=$email?>">
        <br>
        Cargo: <input class="form-control" type="text" name="cargo" value="<?=$cargoId?>">
        <br>
        Departamento: <input class="form-control" type="text" name="departamento" value="<?=$departamentoId?>">
        <br>
        <input class="form-control bg-primary" type="submit" value="Guardar">
    </form>

    <a href="?ctrl=Ctrlempleado">Retornar</a>
</body>
</html>