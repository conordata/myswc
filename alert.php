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
            $historic=Fhistoric::getAllHistoricDay();
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
                        <th style="width: 160px">ID TRASH</th>
                        <th style="width: 350px">ADDRESS</th>
                        <th style="width: 160px">LONG / LAT</th>
                        <th>LEVEL</th>
                        <th>WEIGHT</th>                            
                        <th>STATUS</th>
                        <th>UPLOAD</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($historic as $k => $data):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=$data['idTrash'];?></td>
                            <td><?=$data['address'];?></td>
                            <td><?=($data['longi']." /".$data['lat']);?></td>
                            <td><?=$data['level'];?> %</td>
                            <td><?=$data['weight'];?> Kg</td>
                            <td><?=$data['idTrash'];?></td>
                            <td><?=$data['dateHisto'];?></td>
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