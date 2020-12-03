<?php

header("Access-Control-Allow-Origin: *");
include_once '../modals/Ftrash.php';


$trashs=Ftrash::getAllTrash();

$data=[];
foreach ($trashs as $trash)
{
    $data[]=array($trash['address'],floatval($trash['lat']),floatval($trash['longi']));

}

echo json_encode($data);
