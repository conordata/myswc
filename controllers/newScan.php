<?php
include_once '../modals/Fhistoric.php';
include_once '../modals/Historic.php';


if(isset($_GET['idWorker'],$_GET['idTrash']) && !empty($_GET['idWorker']) && !empty($_GET['idTrash'])&& Fhistoric::checkIfTrashExist($_GET['idTrash'])&& Fhistoric::checkIfWorkerExist($_GET['idWorker']))
{
    Fhistoric::updateDateEmptyAndUser($_GET['idTrash'],$_GET['idWorker']);
    echo  true;
}else
{
    echo  var_dump($_GET);
}

