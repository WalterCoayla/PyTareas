<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Departamentos</h1>

    <a href="?ctrl=CtrlDepartamento&accion=nuevo">Nuevo</a>

    <table class="table table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th colspan="2">Opciones</th>
        </tr>
    <?php
        if (is_array($data))
        foreach ($data as $d) { ?>
        <tr>
            <td><?=$d['id']?></td>
            <td><?=$d['departamento']?></td>
            <td><?=$d['descripcion']?></td>
            <td><a href="?ctrl=CtrlDepartamento&accion=editar&id=<?=$d['id']?>">Editar</a></td>
            <td><a href="?ctrl=CtrlDepartamento&accion=eliminar&id=<?=$d['id']?>">Eliminar</a></td>
            
        </tr>
    
    <?php    }
    ?>
        

    </table>
    <br>
    <a href="?">Retornar</a>
</body>
</html>