<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Tareas</h1>

    <a href="?ctrl=CtrlTarea&accion=nuevo">Nueva</a>

    <table class="table table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha Vencimiento</th>
            <th>Asignada a</th>
            <th>Estado</th>
            <th colspan="4">Opciones</th>
        </tr>
    <?php
        if (is_array($data))
        foreach ($data as $d) { 
            $fecha = new DateTime($d['fecha_vence']);
            $fechaVence = $fecha->format('d-m-Y');
        ?>
        <tr>
            <td><?=$d['id']?></td>
            <td><?=$d['nombre']?></td>
            <td><?=$fechaVence?></td>
            <td><?=$d['nombres'].' '. $d['apellidos']?></td>
            <td><?=$d['estado']?></td>
            
            <td><a title="Editar" href="?ctrl=CtrlTarea&accion=editar&id=<?=$d['id']?>">Editar</a></td>
            <td><a title="Eliminar" href="?ctrl=CtrlTarea&accion=eliminar&id=<?=$d['id']?>">Eliminar</a></td>
            <td><a title="Asignar Tarea" href="?ctrl=CtrlTarea&accion=asignarTarea&id=<?=$d['id']?>&tarea=<?=$d['nombre']?>">Asignar Tarea</a></td>
            <td><a title="Ver Progreso de Ejecución" href="?ctrl=CtrlTarea&accion=verProgreso&id=<?=$d['id']?>">Ver Progreso</a></td>
            
        </tr>
    
    <?php    }
    ?>
        

    </table>
    <br>
    <a href="?">Retornar</a>
</body>
</html>