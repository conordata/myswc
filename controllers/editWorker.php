<?php
if(!isset($_SESSION))
{
    session_start();
}


if(isset($_POST['firstname'],$_POST['lastname'],$_POST['code'],$_POST['phone'],$_POST['area'],$_POST['idPart'])
&& !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['code'])&& !empty($_POST['phone']))
{
    include_once '../modals/Worker.php';
    include_once '../modals/Fworker.php';

    $user=new Worker($_POST['idWorker'],$_POST['firstname'],$_POST['lastname'],$_POST['code'],$_POST['phone'],$_POST['area'],$_POST['idPart'],null);
    
    Fworker::updateWorker($user);
    $_SESSION['done']="Worker Update Successfully";
    header('Location: ../editWorker.php?idWorker='.$_POST["idWorker"]);

}else
{
    $_SESSION['err']="Something Went Wrong !";
    header('Location: ../editWorker.php?idWorker='.$_POST["idWorker"]);
}