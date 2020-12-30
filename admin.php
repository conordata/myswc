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

    <title>mySWC-Admin</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    
    <?php include_once 'commons/menu.php';?>

    <?php include_once 'commons/header.php';?>
       
    

    <div class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>USER MANAGEMENT</p>         
            </div>            

            <div class="col-3 mt-4">
                <div class="">
                    <a class="button-item button-bg-b" href="newAdmin.php">New Admin</a>
                </div>
                <div class="">
                    <a class="button-item button-bg-b" href="listAdmin.php">Admin List</a>
                </div>                
            </div>
                   
        </div>
            
    </div>
</body>


</html>