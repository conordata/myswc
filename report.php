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

    <title>mySWC-Report</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    
    <?php include_once 'commons/menu.php';?>

    <?php include_once 'commons/header.php';?>

    <div class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>COLLECTION REPORT</p>         
            </div>            

            <div class="col-3 mt-4">
                <div class="">
                    <a class="button-item button-bg-b" href="collection.php">Collected Bin</a>
                </div>
                <div class="m-0">
                    <a class="button-item button-bg-b" href="collectionAgent.php">Collector Agent</a>
                </div>                
            </div>
                   
        </div>
            
    </div>
</body>


</html>