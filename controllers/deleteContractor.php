<?php

if(isset($_GET['idPart']) && !empty($_GET['idPart']))
{
    include_once '../modals/Fcontractor.php';

    Fcontractor::deleteContractor($_GET['idPart']);
    header('Location: ../listContractor.php');

}else{
    header('Location: ../listContractor.php');
}