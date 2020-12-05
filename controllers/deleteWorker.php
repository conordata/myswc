<?php

if(isset($_GET['idWorker']) && !empty($_GET['idWorker']))
{
    include_once '../modals/Fworker.php';
    Fworker::deleteWorker($_GET['idWorker']);
    header('Location: ../listWorker.php');

}else
{
    header('Location: ../listWorker.php');
}