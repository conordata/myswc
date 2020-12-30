<?php

session_start();

if(!isset($_SESSION['username']))
{
   header("location: index.php"); 
}

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>mySWC-Worker-List</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    
    <?php include_once 'commons/menu.php';?>

    <?php include_once 'commons/header.php';?>

    
    <?php include_once 'modals/Fworker.php';

        $workers=Fworker::getAllWorkers($_SESSION['idPart']);
    ?>


    <div class="body-container">
        <div class="ml-24">
            <div class="panel mb-4">
                <p>LIST OF WORKERS</p>         
            </div>

            <div class="m-2">
                <a class="btn btn-primary" href="newWorker.php">+ New Worker</a>
            </div>
            

            <div class="panel">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th>FULL NAME </th>
                        <th style="width: 150px">ID WORKER</th>
                        <th style="width: 150px">PHONE NUMBER</th>
                        <th style="width: 120px">AREA / ZONE</th>
                        <th style="width: 180px">DATE CREATED</th>                   
                        <th style="width: 150px">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($workers as $k => $worker):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=ucwords($worker['lastname']." ".$worker['firstname']);?></td>
                            <td><?=$worker['idWorker'];?></td>
                            <td><?=$worker['phone'];?></td>
                            <td><?=$worker['area'];?></td>
                            <td><?=$worker['date_created'];?></td>
                            <td>                               
                                <a class="btn btn-primary" href="editWorker.php?idWorker=<?=$worker['_idUser'];?>">Edit</a>
                                <a class="btn btn-danger" href="controllers/deleteWorker.php?idWorker=<?=$worker['_idUser'];?>">Delete</a>                               
                            </td>
                        </tr>
                    <?php endforeach;?>
                    <tbody>
                </table>
            </div>
                   
        </div>
            
    </div>
</body>

</html>