<?php 
    $file = fopen('tasks.csv', 'r');

    while(($data = fgetcsv($file)) != FALSE){
    $content[] = $data;
    };
    fclose($file);

    function writeTr($contCont) // ici on crée la variable "$contCont", propre a la fonction et qui contiendra les valeurs de $content (grâce au echo writeTr($content) [ligne 51])
    {
        if(!empty($contCont)){
            $tmpVal = "";
            foreach($contCont as $value){
                $tmpVal .='
                <tr>
                <td>'.$value[0].'</td>
                <td>'.$value[1].'</td>
                <td>'.$value[2].'</td>
                <td>'.$value[3].'</td>
                </tr>';
            };
            return $tmpVal;
        };
    };
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/list.css">
    <title>List</title>
</head>
<body>
    <?php include("head.php"); ?>
    <main>
        <h2>Liste des tâches</h2>
        <div class="listCont">
            <table>
                <tr>
                    <th>Titre de la tâche</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Priorité</th>
                </tr>
                <?php echo writeTr($content); ?>
            </table>
        </div>
    </main>
</body>
</html>