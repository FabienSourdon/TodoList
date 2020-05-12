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
    <link rel="stylesheet" href="./css/remove.css">
    <title>Remove</title>
</head>
<body>
    <?php include("head.php"); ?>
    <main>
        <div class="listRemv">
            <h2>Remove a task</h2>
            <form action="remove.php" method="get">
                <label for="fRemv">Tâche a supprimer :</label>
                <select name="fRemv" id="fRemv">
                    <?php foreach($content as $key => $value){ 
                        $i = 0;  
                        print_r('<option value=op'.$key.'>'. $value[$i].' - '.$value[$i+1].' - '.$value[$i+2].' - '.$value[$i+3].'</option>');
                    }?>
                </select>
                <button value="Valider">Valider</button>
                <?php 
                var_dump($data)
                ?>
            </form>
        </div>
    </main>
</body>
</html>