<?php 

$file = fopen('tasks.csv', 'r');

while(($data = fgetcsv($file)) !== FALSE){
    $content[] = $data;
};

fclose($file);

$file = fopen('tasks.csv', 'w');

if(isset($_GET['fRemv'])){
    foreach($content as $key => $value){
        if($_GET['fRemv'] == $key){
            unset($content[$key]);
        }
    }
    var_dump($content);
}

foreach($content as $value){
    if(!empty($value)){
        fputcsv($file, $value);
    }
}

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
                <select name="fRemv">
                    <?php foreach($content as $key => $value){ 
                        $i = 0;  
                        print_r('<option value='.$key.'>'.$value[$i].' - '.$value[$i+1].' - '.$value[$i+2].' - '.$value[$i+3].'</option>');
                    }?>
                </select>
                <button value="Valider">Valider</button>
            </form>
        </div>
    </main>
</body>
</html>