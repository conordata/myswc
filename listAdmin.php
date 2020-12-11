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

    <title>mySWC-Admin-List</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        
        <?php include_once 'modals/Fadmin.php';
            if($_SESSION['role']=='admin'){
                $users=Fadmin::getAllAdmin();
                $internalUsers=Fadmin::getAllAdminOrg($_SESSION['idPart']);
            }

            else {
                $users=Fadmin::getAdminByOrg($_SESSION['idPart']);
                $internalUsers=Fadmin::getAllAdminOrg($_SESSION['']);
                $k=-1;
            }
        ?>

       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="panel mb-4">
                <p>ADMIN LIST</p>         
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
                        <th>FULL NAME</th>
                        <th style="width: 150px">CONTRACTOR</th>
                        <th style="width: 150px">ROLE</th>
                        <th style="width: 180px">DATE CREATED</th>                    
                        <th style="width: 150px">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($internalUsers as $k => $user):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=$user['username'];?></td>
                            <td><?=ucwords($user['lastname']." ".$user['firstname']);?></td></td>
                            <td>-</td>
                            <td><?=$user['role'];?></td>
                            <td><?=$user['date_created'];?></td>
                            <td>                               
                                <a class="btn btn-primary" href="editAdmin.php?idAdmin=<?=$user['_idAdmin'];?>">Edit</a>

                                <?php $href="controllers/deleteAdmin.php?idAdmin=".$user['_idAdmin']."&idPart=".$user['idPart']; ?>

                                <a class="btn btn-danger" href=<?=$href; ?>>Delete</a>                               
                            </td>
                        </tr>
                    <?php endforeach;?>

                    <?php foreach ($users as $j => $user):?>
                        <tr>
                            <td><?=$j+$k+2;?></td>
                            <td><?=$user['username'];?></td>
                            <td><?=ucwords($user['lastname']." ".$user['firstname']);?></td></td>
                            <td><?=ucfirst($user['namePart']);?></td>
                            <td><?=$user['role'];?></td>
                            <td><?=$user['date_created'];?></td>
                            <td>                               
                                <a class="btn btn-primary" href="editAdmin.php?idAdmin=<?=$user['_idAdmin'];?>">Edit</a>

                                <?php $href="controllers/deleteAdmin.php?idAdmin=".$user['_idAdmin']."&idPart=".$user['idPart'];?>

                                <a class="btn btn-danger" href=<?=$href; ?>>Delete</a>                               
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