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

    <title>mySWC-Edit-Admin</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
    <link rel="stylesheet" href="assets/style/form.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        <?php
            include_once 'modals/Fadmin.php';


            $admin=Fadmin::getInfoAdminById($_GET['idAdmin']);
        ?>
       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="form-container">
                <div class="m-2 back-link">
                    <a href="newAdmin.php">< New Admin ></a> ||
                    <a href="listAdmin.php">< Admin List ></a>
                    
                </div>
                <form action="controllers/editAdmin.php" method="post">
                    <div class="form-title">
                        <h2>Update Admin</h2>
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
                        <input type="hidden" name="idAdmin" value="<?=$_GET['idAdmin'];?>">

                        <label for="username"><b>First name</b></label>
                        <input value="<?=$admin['firstname'];?>" type="text" placeholder="Enter First name" name="firstname" required>

                        <label for="username"><b>Last name</b></label>
                        <input value="<?=$admin['lastname'];?>" type="text" placeholder="Enter Last name" name="lastname" required>

                        <label for="username"><b>Username</b></label>
                        <input value="<?=$admin['username'];?>" type="text" placeholder="Enter Username" name="username" required>

                        <label for="psw"><b>Password</b></label>
                        <input value="<?=sha1($admin['password']);?>" type="password" placeholder="Enter Password" name="password" required>

                        <select  class="custom-select" name="role" required>
                            <option value="">Select Role</option>
                            <option <?php if($_SESSION['role']=='admin') echo ('value="admin"'); else echo ('value="admin-cont"');?>>Admin
                            </option>
                            <option value="monitor">View only</option>
                        </select>
                        


                        <button type="submit">Update Admin</button>

                    </div>

                </form>
            </div>
                           
        </div>
            
    </section>
</body>

</html>