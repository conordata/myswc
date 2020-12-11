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

    <title>mySWC-New-Worker</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
    <link rel="stylesheet" href="assets/style/form.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        <?php
            include_once 'modals/Fworker.php';

            $worker=Fworker::getWorkerById($_GET['idWorker']);
        ?>
       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="form-container">
                <div class="m-2 back-link">
                    <a href="newWorker.php">< New Worker ></a> ||
                    <a href="listWorker.php">< Worker List ></a>
                </div>
                <form action="controllers/editWorker.php" method="post">
                    <div class="form-title">
                        <h2>Update Worker</h2>
                    </div>
                    <center class="err-submit">
                        <?php if(isset($_SESSION['err'])):?>
                            <?=$_SESSION['err'];?>
                            <?php unset($_SESSION['err']); endif;?>
                    </center>
                    <center class="success-submit">
                        <?php if(isset($_SESSION['done'])):?>
                            <?=$_SESSION['done'];?>
                            <?php unset($_SESSION['done']); endif;?>
                    </center>
                    <div class="field-container">
                        <label for="username"><b>FirstName</b></label>
                        <input value="<?=$worker['firstname'];?>" type="text" placeholder="Enter FirstName" name="firstname" required>
                        <input type="hidden" name="idWorker" value="<?=$_GET['idWorker'];?>">
                        <label for="psw"><b>LastName</b></label>
                        <input value="<?=$worker['lastname'];?>" type="text" placeholder="Enter LastName" name="lastname" required>

                        <label for="psw"><b>Area</b></label>
                        <input value="<?=$worker['area'];?>" type="text" placeholder="Enter Area" name="area" required>

                        <label for="psw"><b>Id Worker</b></label>
                        <input value="<?=$worker['idWorker'];?>" type="text" placeholder="Enter Code User" name="code" required>
                        <input value="<?=$worker['idWorker'];?>" type="hidden" placeholder="Enter Code User" name="oldCode" required>

                        <label for="psw"><b>Phone</b></label>
                        <input value="<?=$worker['phone'];?>" type="text" placeholder="Enter Phone" name="phone" required>

                        <input value="<?=$_SESSION['idPart'];?>" type="hidden" name="idPart" required>


                        <button type="submit">Update Worker</button>

                    </div>

                </form>
            </div>
                           
        </div>
            
    </section>
</body>

</html>