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

    <title>mySWC-New-Trash</title>

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
                    <a href="listTrash.php">< List of Bins ></a>
                </div>
                <form action="controllers/newTrash.php" method="post">
                    <div class="form-title">
                        <h2>Add New Trash Bin</h2>
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
                        <label><b>Logitude</b></label>
                        <input type="text" placeholder="Enter Logitude" name="long" required>

                        <label><b>Latitude</b></label>
                        <input type="text" placeholder="Enter Latitude" name="lat" required>

                        <label><b>Address</b></label>
                        <input type="text" placeholder="Enter Short Address (Street name, buiding name,...)" name="address" required>

                        <label><b>Area / Zone</b></label>
                        <input type="text" placeholder="Enter Area or Trash zone" name="area" required>

                        <label><b>Id Trash</b></label>
                        <input type="text" placeholder="Enter Id Trash" name="idTras" required>

                        <select  class="custom-select" name="type" required>  
                            <option value="">Select type of Trash</option>
                            <option value="hazardous">Hazardous</option>
                            <option value="recyclable">Recyclable</option>
                            <option value="wet">Wet</option>
                            <option value="dry">Dry</option>
                            <option value="other">Other</option>
                        </select>

                        <button type="submit">Save Trash</button>

                    </div>


                </form>
            </div>
                           
        </div>
            
    </div>
</body>

</html>