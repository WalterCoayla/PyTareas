<?php
$id = isset ($tarea['id'])?$tarea['id']:"";
$nombre = isset ($tarea['nombre'])?$tarea['nombre']:"";
$fecha = isset ($tarea['fecha_vence'])?$tarea['fecha_vence']:"";
$estadoId= isset ($tarea['estados_id'])?$tarea['estados_id']:"";
$empleadoId= isset ($tarea['empleados_id'])?$tarea['empleados_id']:"";

$editar = ($id != '')?1:0;  # 1: Editar / 0: Nuevo

$titulo = ($editar==1)?'Editar Tarea':'Nueva Tarea';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <h1><?=$titulo?></h1>
    <form action="?ctrl=CtrlTarea&accion=guardar" method="post">
        id: <input class="form-control" type="text" name="id" value="<?=$id?>" readonly>
        <br>
        Nombre: <input class="form-control" type="text" name="nombre" value="<?=$nombre?>">
        <br>
        Fecha Vencimiento: 
        <input class="form-control" type="date" name="fecha" value="<?=substr($fecha, 0, 10)?>">
        <br>
        Asignado a: 
        
        <select class="form-control" name="empleado" id="">
        <?php
            if(is_array($empleados))
            foreach ($empleados as $e) :
                $selected = ($e['id']==$empleadoId)?'selected':'';
        ?>
            <option <?=$selected?> value="<?=$e['id']?>"><?=$e['nombres'].' '.$e['apellidos']?></option>
        <?php
            endforeach;
        ?>
        </select>


        <br>
        Estado: 
        
        <select class="form-control" name="estado" id="">
        <?php
            if(is_array($estados))
            foreach ($estados as $e) :
                $selected = ($e['id']==$estadoId)?'selected':'';
        ?>
            <option <?=$selected?> value="<?=$e['id']?>"><?=$e['estado']?></option>
        <?php
            endforeach;
        ?>
        </select>


        <br>
        
        <input class="form-control bg-primary" type="submit" value="Guardar">
    </form>

    <a href="?ctrl=CtrlTarea">Retornar</a>
</body>
</html>