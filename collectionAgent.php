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

    <title>mySWC-Collection-Agent</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">   
</head>
<body>
    
    <?php include_once 'commons/menu.php';?>

    <?php include_once 'commons/header.php';?>

    <?php 
        include_once 'modals/Fhistoric.php';

        if ($_SESSION['role']=="admin") {
            $historic=Fhistoric::getAllHistoricCollectionAgent($_SESSION['dateStart'],$_SESSION['dateEnd']);
            $historic_1=Fhistoric::getAllHistoricCollectionAgentInternal($_SESSION['dateStart'],$_SESSION['dateEnd'],$_SESSION['idPart']);
        }
        else {
            $historic=Fhistoric::getHistoricCollectionAgentByIdPart($_SESSION['dateStart'],$_SESSION['dateEnd'],$_SESSION['idPart']);
            $historic_1=array();
            
            $k=-1;
        }

        
    ?>

    <div class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>COLLECTOR AGENT</p>         
            </div>
            <div class="panel-top">
                <div class="m-2">
                    <a class="btn btn-primary" href="collection.php">Collected Bin</a>
                </div>

                <div class="panel-form">
                    <form class="form-inline" method="post" action="controllers/collection.php">
                        <label>From:</label>
                        <input type="date" name="date_start" value="<?=($_SESSION['dateStart']);?>" required>
                        <label>To:</label>
                        <input type="date" name="date_end" value="<?=($_SESSION['dateEnd']);?>" required>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>         
                </div>  
            </div>          

            <div class="panel">
                <div class="sort-form">
                    <label for="contract">CONTRACTOR: </label>
                    <input type="text" id="contract" onkeyup="tableFilter()" placeholder="Search for contractor.." title="Type in a collection agency">
                </div>
                
                <table id="myTable">
                    <thead>
                        <tr>
                            <th style="width: 40px">#</th>
                            <th style="width: 150px">ID WORKER</th>
                            <th>FULL NAME</th>
                            <th style="width: 150px">AREA / ZONE</th>
                            <th style="width: 150px">ORGANIZATION</th>
                            <th style="width: 150px">WEIGHT (W)</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($historic_1 as $k => $data):?>
                        <tr>
                            <td><?=$k+1;?></td>
                            <td><?=$data['idUser'];?></td>
                            <td><?=ucfirst($data['lastname']." ".$data['firstname']);?></td>
                            <td><?=$data['area'];?></td>
                            <td>internal</td>
                            <td><?=$data['weight'];?>Kg</td>                            
                        </tr>
                    <?php endforeach;?>
                    
                    <?php foreach ($historic as $j => $data):?>
                        <tr>
                            <td><?=$j+$k+2;?></td>
                            <td><?=$data['idUser'];?></td>
                            <td><?=ucfirst($data['lastname']." ".$data['firstname']);?></td>
                            <td><?=$data['area'];?></td>
                            <td><?=$data['namePart'];?></td>
                            <td><?=$data['weight'];?>Kg</td>                            
                        </tr>
                    <?php endforeach;?>    
                    <tbody>
                </table>
                <div style="font-family: Arial; margin: 10px; text-align: right; padding-right: 10px;" id="tKg"></div>
                              
            </div>
                   
        </div>
            
    </div>
</body>
<script>

    /* table filter */

    function tableFilter() {
        var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("contract");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      var totalKg=0;
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            // sum calculation
            totalKg = totalKg + parseInt(table.rows[i].cells[5].innerHTML);
        } 
        else {
            tr[i].style.display = "none";
        }     
      }
    }
    document.getElementById("tKg").innerHTML = "TOTAL WEIGHT: " + parseInt(totalKg)+"Kg";
}

   
            
</script>

</html>
