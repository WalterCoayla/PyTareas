<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona un Supervisor</title>
</head>
<body>
    <h1>Selecciona un Supervisor</h1>
    <form action="?ctrl=CtrlEmpleado&accion=asignarSupervisor&id=<?=$empleado?>" method="post">
        Supervisor:
        <select name="supervisor" id="">
            <?php 
            if (!is_null($data))
            foreach ($data as $d) :
            ?>
                <option value="<?=$d['id']?>">
                    <?=$d['nombres'] . " ". $d['apellidos']?>
                </option>

            <?php 
            endforeach;
            ?>
            
        </select>
        <br>
        <input type="submit" value="Asignar">
    </form>
    <br>
    <a href="?ctrl=CtrlEmpleado">Retornar</a>
</body>
</html>