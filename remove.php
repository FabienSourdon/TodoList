<?php 

$file = fopen('tasks.csv', 'r');

while(($data = fgetcsv($file)) != FALSE){
    $content[] = $data;
};

fclose($file);

if(isset($_GET['fRemv'])){
    unsetCsv($_GET, $content);
    $content = unsetCsv($_GET, $content);
    writeCsv($_GET, $content);
}

function unsetCsv($contGet, $contCont){
    $file = fopen('tasks.csv', 'w');
    foreach($contCont as $key => $value){
        if($contGet['fRemv'] == $key){
            unset($contCont[$key]);
        }
    }
    fclose($file);
    return $contCont;
}

function writeCsv($contGet, $contCont){
    $file = fopen('tasks.csv', 'w');
    foreach($contCont as $value){
        if(!empty($value)){
            fputcsv($file, $value);
        }
    }
    fclose($file);
}

function listOption($contCont){
    $tmpVal = "";
    foreach($contCont as $key => $value){ 
        $i = 0;  
        $tmpVal .= '<option value='.$key.'>'.$value[$i].' - '.$value[$i+1].' - '.$value[$i+2].' - '.$value[$i+3].'</option>';
    }
    return $tmpVal;
}

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
                    <?php echo listOption($content)?>
                </select>
                <button value="Valider">Valider</button>
            </form>
        </div>
    </main>
</body>
</html>