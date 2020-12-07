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

    <title>Alert</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        <?php 
            include_once 'modals/Fhistoric.php';

            $historic=Fhistoric::getAllHistoricDayFull();
        ?>
       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>COLLECTION ALERT</p>         
            </div>
            

            <div class="panel">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th style="width: 140px">ID TRASH</th>
                        <th>ADDRESS</th>
                        <th style="width: 170px">LONG / LAT</th>
                        <th style="width: 100px">AREA / ZONE</th>
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
                            <td><?=$data['idTrash'];?></td>
                            <td><?=$data['address'];?></td>
                            <td><?=($data['longi']." /".$data['lat']);?></td>
                            <td><?=$data['area'];?></td>
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
            
    </section>
</body>

<script>

    /* =========================== Auto refresh page ============================== */

    setInterval(function(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log((this.responseText));

                var div=document.getElementById('moni');
                div.innerHTML=(this.responseText)
            }

        };
        xmlhttp.open('GET', 'http://127.0.0.1/myswc/controllers/getMonitoring.php');
        xmlhttp.send();
    }, 2000);   //run this thang every 2 seconds


</script>

</html>