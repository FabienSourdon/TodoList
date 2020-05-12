<?php
    var_dump($_POST);
    /*
        Ce que fait PHP
        $_POST =
        [
            'title' => 'Ma première tâche',
            'description' => 'jnoivgoineriob g',
            'date' => '2020-04-20',
            'prioity' => 'critical'
        ];
    */

    //    Si le formulaire a été soumis
    if(!empty($_POST))
    {
        //    Ouverture du fichier en écriture seule
        $file = fopen('tasks.csv', 'a');    // Vaut false si problème

          //    Enregistrement de la ligne à la suite du fichier
        fputcsv($file, $_POST);

        //    Fermeture du fichier
        fclose($file);

//    Dans le fichier : Ma première tâche,jnoivgoineriob g,2020-04-20,critical
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Add a task</title>
    </head>
    <body>
        <form action="add.php" method="post">
            <input type="text" name="title" placeholder="Title">
            <textarea name="description" placeholder="Description"></textarea>
            <input type="date" name="date" placeholder="Date">
            <select name="priority">
                <option value="critical">Critical</option>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                  <option value="trivial">Trivial</option>
            </select>
               <button type="submit">Add</button>
        </form>
    </body>
</html>