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

    <script src="assets/js/jquery-3.4.1.min.js"></script>
  
    <script> 
        $(function() {
          setInterval(function() {
            $("#monitor").load("monitoring.php #monitor");
            }, 1000);
          });
    </script>
   
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
                <table id="monitor">
                    <thead>
                    <tr>
                        <th style="width: 40px">#</th>
                        <th>ID TRASH</th>
                        <th style="width: 190px">LONG / LAT</th>
                        <th style="width: 120px">AREA / ZONE</th>
                        <th style="width: 120px">L / W</th>                         
                        <th style="width: 120px">STATUS</th>
                        <th style="width: 150px">LAST UPDATE</th>
                        <th style="width: 90px" title="Duration of garbage in the trash">DURATION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($historic as $k => $data):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=$data['idTrash'];?></td>
                            <td><?=($data['longi']." /".$data['lat']);?></td>
                            <td title="<?=$data['address'];?>"><?=$data['area'];?></td>
                            <td><?=$data['level']."% / ".$data['weight']." Kg";?>%</td>
                            <td>
                            <?php

                                $date_1 = new DateTime($data['dateHisto']);
                                $date_2 = new DateTime($data['lastUpdate']);
                                $int = ($date_1->diff($date_2));

                                if ($data['dateFull']!=null) {
                                    echo "<t style='color:red'>Alert !</t>";
                                }
                                elseif ($int->format('%a')>4) {
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

</html>