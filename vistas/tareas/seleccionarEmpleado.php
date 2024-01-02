
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Asignar Tarea a Empleado</h1>
    <h3>Tarea: <?=$tarea?></h3>

    <form action="?ctrl=CtrlTarea&accion=asignarTareaAEmpleado" method="post">
        <input hidden type="text" name="idTarea" value="<?=$idtarea?>">
        Asignara a: 
        <select name="idEmpleado">
        <?php
            foreach ($empleados as $e) :
        ?>
            <option value="<?=$e['id']?>"><?=$e['nombres']?> <?=$e['apellidos']?></option>
        <?php
            endforeach;
        ?>
        </select>
        <br>
        <button type="submit">Actualizar</button>

    </form>
</body>
</html>