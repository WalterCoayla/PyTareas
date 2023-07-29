<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
</head>
<body>
    <h1>Opciones del Sistema</h1>
    
    <ul>
        <?php foreach ($menu as $key => $value) { ?>

        <li>
            <a href="?ctrl=<?=$key?>"><?=$value?></a>
        </li>

        <?php
            }
        ?>
        

    </ul>
    
</body>
</html>