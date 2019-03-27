<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <fieldset>
    <legend>Incrementar precio 10%</legend>

    <form action="sp_update1.php.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Editorialo</th>
                <td><input type="text" name="titulo" placeholder="Titulo" value="<?php echo $data['titulo'] ?>" /></td>
            
            </tr>		
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                <td><button type="submit">Save Changes</button></td>
                <td><a href="sp_page.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
</fieldset>
  
</body>
</html>