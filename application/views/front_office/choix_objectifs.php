<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Choisir un objectif </h1>
    <form action="" method="post">
        <p>
            <select name="objectif" id="">
                <?php foreach($choix_objectifs as $choix) { ?>
                    <option value="<?php echo $choix['id']; ?>">
                        <?php echo $choix['designation']; ?>
                    </option>
                <?php } ?>
            </select>
        </p>
        <p>
            <button type="submit"> Valider </button>
        </p>
    </form>
</body>
</html>