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

    <title>mySWC-Admin</title>

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
                <p>USER MANAGEMENT</p>         
            </div>            

            <div class="col-2 mt-4">
                <div class="">
                    <a class="button-item button-bg-b" href="newAdmin.php">New Admin</a>
                </div>
                <div class="">
                    <a class="button-item button-bg-b" href="listAdmin.php">Admin List</a>
                </div>                
            </div>
                   
        </div>
            
    </section>
</body>


</html>