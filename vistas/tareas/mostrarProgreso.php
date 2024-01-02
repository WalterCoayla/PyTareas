<?php
$tarea = is_array($data)?$data[0]['tarea']:'';
$empleado = is_array($data)?$data[0]['nombres'].' '.$data[0]['apellidos']:'';
$fechaVencimiento = is_array($data)?$data[0]['fecha_vence']:'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progreso Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Progreso de Tarea: <?=$tarea?></h1>
    <h3>Empleado: <?=$empleado?></h3>
    <h4>Vence: <?=$fechaVencimiento?></h4>

    <a href="?ctrl=CtrlTarea&accion=nuevoProgreso">Nueva</a>

    <table class="table table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Comentario</th>
            <th>Es Completa?</th>
        </tr>
    <?php
        if (is_array($data))
        foreach ($data as $d) { 
            if (!is_null($d['id'])){
            $fecha = new DateTime($d['fecha']);
            $fecha = $fecha->format('d-m-Y');
        ?>
        <tr>
            <td><?=$d['id']?></td>
            <td><?=$fecha?></td>
            <td><?=$d['descripcion']?></td>
            <td><?=$d['comentario']?></td>
            <td><?=$d['es_completa']?></td>
            
        </tr>
    
    <?php
            }    
        }
    ?>
        

    </table>
    <br>
    <a href="?ctrl=CtrlTarea">Retornar</a>
</body>
</html>