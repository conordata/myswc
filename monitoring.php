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

    <title>mySWC-Monitoring</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">
   
</head>
<body>
    <section>
        <?php include_once 'commons/menu.php';?>

        <?php include_once 'commons/header.php';?>

        <?php 
            include_once 'modals/Fhistoric.php';
            $historic=Fhistoric::getAllHistoricDay();
        ?>
       
    </section>

    <section class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>MONITORING</p>         
            </div>
            

            <div class="panel">
                <table>
                    <thead>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th>ID TRASH</th>
                        <th style="width: 180px">LONG / LAT</th>
                        <th style="width: 150px">AREA / ZONE</th>
                        <th style="width: 100px">LEVEL</th>
                        <th style="width: 100px">WEIGHT</th>                         
                        <th style="width: 120px">STATUS</th>
                        <th style="width: 150px">LAST UPDATE</th>
                        <th style="width: 100px" title="Duration of garbage in the trash">DURATION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($historic as $k => $data):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=$data['idTrash'];?></td>
                            <td><?=($data['longi']." /".$data['lat']);?></td>
                            <td><?=$data['area'];?></td>
                            <td><?=$data['level'];?>%</td>
                            <td><?=$data['weight'];?>Kg</td>
                            <td>
                                <?php

                                $date_1 = new DateTime($data['dateHisto']);
                                $date_2 = new DateTime($data['lastUpdate']);
                                $int = ($date_1->diff($date_2));

                                if ($data['dateFull']!=null) {
                                    echo "<t style='color:red'>Alert !</t>";
                                }
                                elseif ($int->format('%a')==4) {
                                    echo "<t style='color:orange'>Col. requested !</t>";
                                }
                                else echo "<t style='color:Green'>Normal</t>";

                                ?>
                            </td>
                            <td><?=$data['lastUpdate'];?></td>
                            <td><?php

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