<?php 

$file = fopen('tasks.csv', 'r');

while(($data = fgetcsv($file)) !== FALSE){
    $content[] = $data;
};
fclose($file);

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
            <?php 
                if(isset($content)){
                foreach($content as $value){ 
                $i = 0;
            ?>
                    <tr>
                        <td><?php print_r($value[$i]) ?></td>
                        <td><?php print_r($value[$i+1]) ?></td>
                        <td><?php print_r($value[$i+2]) ?></td>
                        <td><?php print_r($value[$i+3]) ?></td>
                    </tr>
            <?php $i++; }} ?>
                
                
            </table>
        </div>
    </main>
</body>
</html>