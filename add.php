<?php

function addContent($contPost){
    if(!empty($contPost)){
        $file = fopen('tasks.csv', 'a');
        fputcsv($file, $contPost);
        fclose($file);
    }
}

addcontent($_POST);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/add.css">
    <title>Add</title>
</head>
<body>
    <?php include("head.php"); ?>
    <main>
        <section class="contList">
            <h2>Ajouter une tâche</h2>
                <form action="add.php" method="post" class="formMain" >
                    <div class="divForm">
                        <label for="fname">Titre :</label>
                        <input type="text" id="fname" name="fname" class="inp">
                    </div>
                    <div class="divForm">
                        <label for="fdesc">Description :</label>
                        <textarea id="fdesc" name="fdesc" class="inp"></textarea>
                    </div class="divForm">
                    <div class="divForm">
                        <label for="fdate">Date :</label>
                        <input type="date" id="fdate" name="fdate" class="inp">
                    </div>
                    <div class="divForm">
                        <label for="fprio">Priorité :</label>
                        <select name="fprio" id="fprio" class="inp">
                            <option value="critique">Critique</option>
                            <option value="haute">Haute</option>
                            <option value="moyenne">Moyenne</option>
                            <option value="basse">Basse</option>
                        </select>
                    </div>
                    <button type="submit" class="btnsub">Soummettre</button>
                </form>
        </section>
    </main>
</body>
</html>