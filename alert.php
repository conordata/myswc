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

    <title>mySWC-Alert</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
   
    <?php include_once 'commons/menu.php';?>

    <?php include_once 'commons/header.php';?>

    <?php 
        include_once 'modals/Fhistoric.php';

        $historic=Fhistoric::getAllHistoricDayFull();
    ?>
       
    <div class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>COLLECTION ALERT</p>         
            </div>
            

            <div class="panel">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th>ID TRASH</th>
                        <th style="width: 190px">LONG / LAT</th>
                        <th style="width: 120px">AREA / ZONE</th>
                        <th style="width: 90px">L / W</th>
                        <th style="width: 150px">DATE FULL</th>                     
                        <th style="width: 150px">LAST UPDATE</th>
                        <th style="width: 80px" title="Duration of garbage in the trash">DURATION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($historic as $k => $data):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td title="<?=ucfirst($data['typeTrash'])?>"><?=$data['idTrash'];?></td>
                            <td><?=($data['longi']." /".$data['lat']);?></td>
                            <td title="<?=$data['address'];?>"><?=$data['area'];?></td>
                            <td><?=$data['level']."% / ".$data['weight']."Kg";?></td>
                            <td><?=$data['dateFull'];?></td>
                            <td><?=$data['lastUpdate'];?></td>
                            <td><?php

                                $date_2 = new DateTime($data['lastUpdate']);
                                $date_3 = new dateTime($data['dateFull']);
                                
                                $int = ($date_3->diff($date_2));

                                echo($int->format('%R%a days'));

                                ?>                                    
                            </td>
                        </tr>
                    <?php endforeach;?>
                    <tbody>
                </table>
            </div>
                   
        </div>
            
    </div>
</body>

</html>