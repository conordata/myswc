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
    <title>DashBoard</title>
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
                <p>HOME</p>         
            </div>
            <div class="col-3">
                <div class="item">
                    <a href="monitoring.php"><img style="width: 100%; height: 180px; padding: 0px" src="assets/img/monitoring.jpg"></a>
                    <div class="item-link">
                       <a href="monitoring.php">Monitoring</a>
                    </div>                       
                </div>  
                <div class="item">
                    <a href="map.php"><img style="width: 100%; height: 180px; padding: 0px" src="assets/img/map.jpg"></a>
                    <div class="item-link">
                       <a href="map.php">Map</a>
                    </div>                       
                </div>
                <div class="item">
                    <a href="alert.php"><img style="width: 100%; height: 180px; padding: 0px" src="assets/img/alert.jpg"></a>
                    <div class="item-link">
                       <a href="alert.php">Alert</a>
                    </div>                       
                </div>
                <div class="item">
                    <a href="report.php"><img style="width: 100%; height: 180px; padding: 0px" src="assets/img/report.jpg"></a>
                    <div class="item-link">
                       <a href="report.php">Daily Report</a>
                    </div>                       
                </div> 
                <div class="item">
                    <a href="trash.php"><img style="width: 100%; height: 180px; padding: 0px" src="assets/img/trash.jpg"></a>
                    <div class="item-link">
                       <a href="trash.php">Trash Bin</a>
                    </div>                       
                </div>
                <div class="item">
                    <a href="worker.php"><img style="width: 100%; height: 180px; padding: 0px" src="assets/img/worker.jpg"></a>
                    <div class="item-link">
                       <a href="worker.php">Worker & Contractor</a>
                    </div>                       
                </div>
                <div class="item">
                    <a href="admin.php"><img style="width: 100%; height: 180px; padding: 0px" src="assets/img/user.jpg"></a>
                    <div class="item-link">
                       <a href="admin.php">Admin</a>
                    </div>                       
                </div>   
            </div>    
        </div>
            
    </section>
</body>
</html>