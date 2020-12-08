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

    <title>mySWC-New-Admin</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
    <link rel="stylesheet" href="assets/style/form.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>
       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="form-container">
                <div class="m-2 back-link">
                    <a href="listAdmin.php">< Admin List ></a>
                </div>
                <form action="controllers/newAdmin.php" method="post">
                    <div class="form-title">
                        <h2>Add New Admin</h2>
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
                        <label for="username"><b>First Name</b></label>
                        <input type="text" placeholder="Enter First name" name="firstname" required>
                        <label for="username"><b>Last Name</b></label>
                        <input type="text" placeholder="Enter Last name" name="lastname" required>
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required>
                        <select  class="custom-select" name="role" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="contractor">Contractor</option>
                        </select>
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>



                        <br>
                        <label for="psw"></label>
                        <?php
                        include_once 'modals/Fcontractor.php';

                        $contractors=Fcontractor::getAllContractor();

                        ;?>
                        <select  class="custom-select" name="idPart" >
                            <option value="0">Select Contractor Name</option>
                            <?php foreach($contractors as $contractor):?>
                                <option value="<?=$contractor['_idPart'];?>"><?=$contractor['namePart'];?></option>
                            <?php endforeach;?>
                        </select>

                        <button type="submit">Save User</button>

                    </div>

                </form>
            </div>
                           
        </div>
            
    </section>
</body>

</html>