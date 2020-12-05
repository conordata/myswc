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

    <title>mySWC-Partners</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>WORKER & CONTRACTOR MANAGEMENT</p>         
            </div>
            <div class="col-3 mt-4">
                <div class="">
                    <a class="button-item button-bg-b" href="newWorker.php">New Worker</a>
                </div>
                <div class="">
                    <a class="button-item button-bg-b" href="listWorker.php">List of Workers</a>
                </div> 
                <div class="">
                    <a class="button-item button-bg-b" href="newContractor.php">New Contractor</a>
                </div> 
                <div class="mt-2">
                    <a class="button-item button-bg-b" href="listContractor.php">List of Contractors</a>
                </div>              
            </div>
                               

        </div>
            
    </section>
</body>


</html>