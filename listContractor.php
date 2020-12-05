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

    <title>mySWC-Contractor-List</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        
        <?php include_once 'modals/Fcontractor.php';
            $contractors=Fcontractor::getAllContractor();
        ?>

       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="panel mb-4">
                <p>LIST OF CONTRACTORS</p>         
            </div>

            <div class="m-2">
                <a class="btn btn-primary" href="newWorker.php">+ New Contractor</a>
            </div>
            

            <div class="panel">
                <table class="fl-table">
                    <thead>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th>NAME</th>
                        <th style="width: 120px">USERNAME</th>
                        <th>ADDRESS</th>
                        <th style="width: 130px">PHONE</th>
                        <th style="width: 110px">AREA / ZONE</th>
                        <th style="width: 180px">DATE CREATED</th>
                        <th style="width: 150px">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($contractors as $k => $data):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=$data['namePart'];?></td>
                            <td><?=$data['username'];?></td>
                            <td><?=$data['address'];?></td>
                            <td><?=$data['phone'];?></td>
                            <td><?=$data['area'];?></td>
                            <td><?=$data['date_add'];?></td>
                            <td>
                                <a class="btn btn-primary" href="editContractor.php?idPart=<?=$data['_idPart'];?>">Edit</a>
                                <a class="btn btn-danger" href="controllers/deleteContractor.php?idPart=<?=$data['_idPart'];?>">Delete</a>
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