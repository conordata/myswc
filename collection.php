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

    <title>mySWC-Collection</title>

    <link rel="stylesheet" href="assets/style/menu.css">
    <link rel="stylesheet" href="assets/style/main.css">   
</head>
<body>
    
    <?php include_once 'commons/menu.php';?>

    <?php include_once 'commons/header.php';?>

    <?php 
        include_once 'modals/Fhistoric.php';

        $historic=Fhistoric::getAllHistoricCollection($_SESSION['dateStart'],$_SESSION['dateEnd']);
        $k=0;
    ?>
       
    

    <div class="body-container">
        <div class="ml-24">
            <div class="panel">
                <p>COLLECTED BIN</p>         
            </div>
            <div class="panel-top">
                <div class="m-2">
                    <a class="btn btn-primary" href="collectionAgent.php">Collector Agent</a>
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
                    <label for="myArea">AREA: </label>
                    <input type="text" id="myArea" onkeyup="tableFilter()" placeholder="Search for areas.." title="Type in an Area">
                </div>
                
                <table id="myTable">
                    <thead>
                        <tr>
                            <th style="width: 40px">#</th>
                            <th>ID TRASH (TYPE)</th>
                            <th style="width: 100px">AREA / ZONE</th>
                            <th style="width: 90px">LEVEL (L)</th>
                            <th style="width: 90px">WEIGHT (W)</th>
                            <th style="width: 140px">DATE FULL</th>                     
                            <th style="width: 140px">DATE EMPTIED</th>
                            <th style="width: 160px" title="Collector agent">AGENT (ID)</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($historic as $k => $data):?>
                    <?php

                        $date_1 = new DateTime($data['dateFull']);
                        $date_2 = new DateTime($data['dateEmpty']);
                        $int = ($date_1->diff($date_2));

                        if ($int->format('%a')>1.5 and $data['dateFull']!=null) {
                            $color="color: red";
                        }
                        else $color="color: black";

                    ?>
                        <tr style="<?=$color;?>">
                            <td><?=$k+1;?></td>
                            <td><?=$data['idTrash']." (".ucfirst($data['typeTrash']).")";?></td>
                            <td><?=$data['area'];?></td>
                            <td><?=$data['level'];?>%</td>
                            <td><?=$data['weight'];?>Kg</td>
                            <td><?=$data['dateFull'];?></td>
                            <td><?=$data['dateEmpty'];?></td>
                            <td><?=ucfirst($data['lastname'])." (".$data['idUser'].")";?></td>
                        </tr>
                        
                    <?php endforeach;?>    
                    <tbody>
                </table>
                <table>
                    <thead>
                         <tr>
                            <th style="width: 40px">#</th>
                            <th style="width: 200px">STARTING DATE</th>
                            <th>ENDING DATE</th>
                            <th style="width: 150px">TOTAL BIN</th>
                            <th style="width: 150px">TOLAL WEIGHT</th>
                            <th style="width: 150px" title="Average weight Per Bin">AVER. W /BIN</th>
                            <th style="width: 150px" title="Average level Per Bin">AVER. L /BIN</th>            
                        </tr>                        
                    </thead> 
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th><?=$_SESSION['dateStart'];?></th>
                            <th><?=$_SESSION['dateEnd'];?></th>
                            <th id="tBin"></th>
                            <th id="tKg"></th>
                            <th id="aKg"></th>
                            <th id="aLevel"></th>
                        </tr>
                    </tbody>                   
                </table>
            </div>
                   
        </div>
            
    </div>
</body>
<script>

    tableFilter();        
   
    /* table filter and Avarage calculation */

    function tableFilter() {
        var input, filter, table, tr, td, i, txtValue, totalKg=0, totalLevel=0;
        input = document.getElementById("myArea");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Filter and Kg and level sum calculation

        var list=[];
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";

                    // Average calculation
                    totalKg = totalKg + parseInt(table.rows[i].cells[4].innerHTML);
                    totalLevel= totalLevel + parseInt(table.rows[i].cells[3].innerHTML);

                    if (!(list.includes(table.rows[i].cells[1].innerHTML))) {
                        list.push(table.rows[i].cells[1].innerHTML);
                    }
                } 
                else {
                    tr[i].style.display = "none";
                }
            }       
        }
        // End filter

        document.getElementById("tKg").innerHTML = parseInt(totalKg)+"Kg";
        document.getElementById("tBin").innerHTML = parseInt(list.length); 
        document.getElementById("aKg").innerHTML = parseInt(totalKg/list.length)+"Kg";
        document.getElementById("aLevel").innerHTML = parseInt(totalLevel/list.length)+"%"; 
    }
   
            
</script>

</html>
