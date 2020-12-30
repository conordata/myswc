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

    <title>mySWC-New-Worker</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
    <link rel="stylesheet" href="assets/style/form.css">
   
</head>
<body>
    
    <?php include_once 'commons/menu.php';?>

    <?php include_once 'commons/header.php';?>
       

    <div class="body-container">
        <div class="ml-24">
            <div class="form-container">
                <div class="m-2 back-link">
                    <a href="listWorker.php">< Worker List ></a>
                </div>
                <form action="controllers/newWorker.php" method="post">
                    <div class="form-title">
                        <h2>Add New Worker</h2>
                    </div>
                    <div class="err-submit">
                        <?php if(isset($_SESSION['err'])):?>
                            <?=$_SESSION['err'];?>
                            <?php unset($_SESSION['err']); endif;?>
                    </div>
                    <div class="success-submit">
                        <?php if(isset($_SESSION['done'])):?>
                            <?=$_SESSION['done'];?>
                            <?php unset($_SESSION['done']); endif;?>
                    </div>
                    <div class="field-container">
                        <label><b>First Name</b></label>
                        <input type="text" placeholder="Enter FirstName" name="firstname" required>

                        <label><b>Last Name</b></label>
                        <input type="text" placeholder="Enter LastName" name="lastname" required>

                        <label><b>Area</b></label>
                        <input type="text" placeholder="Enter Area" name="area" required>

                        <label><b>Id Worker</b></label>
                        <input type="text" placeholder="Enter Id Worker" name="code" required>

                        <label><b>Phone</b></label>
                        <input type="number" placeholder="Enter Phone" name="phone" required>
                        
                        
                        <input type="hidden" value="<?=$_SESSION['idPart'];?>" name="idPart">
                        

                        <button type="submit">Save Worker</button>

                    </div>

                </form>
            </div>
                           
        </div>
            
    </div>
</body>

</html>