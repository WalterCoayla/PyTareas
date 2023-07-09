<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estados</title>
</head>
<body>
    <h1>Estados</h1>

    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
        </tr>
    <?php
        foreach ($data as $d) { ?>
        <tr>
            <td><?=$d['id']?></td>
            <td><?=$d['estado']?></td>
        </tr>
    
    <?php    }
    ?>
        

    </table>
</body>
</html>