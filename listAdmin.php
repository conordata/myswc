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

    <title>mySWC-List-Trash</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        
        <?php include_once 'modals/Fadmin.php';
            $users=Fadmin::getAllAdmin();
        ?>

       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="panel mb-4">
                <p>LIST ADMIN</p>         
            </div>

            <div class="m-2">
                <a class="btn btn-primary" href="newAdmin.php">+ New Admin</a>
            </div>
            

            <div class="panel">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th style="width: 140px">USERNAME</th>
                        <th>FULL NAME / ORGANISATION</th>
                        <th style="width: 200px">ROLE</th>
                        <th style="width: 200px">DATE CREATED</th>                    
                        <th style="width: 150px">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $k => $user):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=$user['username'];?></td>
                            <td></td>
                            <td><?=$user['role'];?></td>
                            <td><?=$user['date_created'];?></td>
                            <td>                               
                                <a class="btn btn-primary" href="alterAdmin.php?idAdmin=<?=$user['_idAdmin'];?>">Edit</a>
                                <a class="btn btn-danger" href="controllers/deleteAdmin.php?idAdmin=<?=$user['_idAdmin'];?>">Delete</a>                               
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