<?php

if(!isset($_SESSION))
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>mySWC-Trash-List</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        <?php 
            include_once 'modals/Ftrash.php';

            $trahs=Ftrash::getAllTrash();
        ?>

       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="panel mb-4">
                <p>LIST OF BINS</p>         
            </div>

            <div class="m-2">
                <a class="btn btn-primary" href="newTrash.php">+ New Bin</a>
            </div>
            

            <div class="panel">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th style="width: 140px">ID TRASH BIN</th>
                        <th>ADDRESS</th>
                        <th style="width: 120px">AREA / ZONE</th>
                        <th style="width: 110px">LONGITUDE</th>
                        <th style="width: 110px">LATITUDE</th>
                        <th style="width: 90px">TYPE</th>
                        <th style="width: 150px">DATE CREATED</th>                    
                        <th style="width: 150px">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($trahs as $k => $trah):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=$trah['idTrash'];?></td>
                            <td><?=$trah['address'];?></td>
                            <td><?=$trah['area'];?></td>
                            <td><?=$trah['longi'];?></td>
                            <td><?=$trah['lat'];?></td>                            
                            <td><?=$trah['typeTrash'];?></td>
                            <td><?=$trah['dateTrash'];?></td>
                            <td>                               
                                <a class="btn btn-primary" href="editTrash.php?idTrash=<?=$trah['_idTrash'];?>">Edit</a>
                                <a class="btn btn-danger" href="controllers/deleteTrash.php?idTrash=<?=$trah['_idTrash'];?>">Delete</a>                               
                            </td>
                        </tr>
                    <?php endforeach;?>
                    <tbody>
                </table>
            </div>
                   
        </div>
            
    </section>
</body>

</html>