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

    <title>mySWC-Trash</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        <?php 
            include_once 'modals/Fhistoric.php';
            $historic=Fhistoric::getAllHistoricDay();
        ?>
       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>TRASH MANAGEMENT</p>         
            </div>            

            <div class="col-3 mt-4">
                <div class="">
                    <a class="button-item button-bg-b" href="newTrash.php">New Trash Bin</a>
                </div>
                <div class="">
                    <a class="button-item button-bg-b" href="listTrash.php">List of Bins</a>
                </div>                
            </div>
                   
        </div>
            
    </section>
</body>


</html>