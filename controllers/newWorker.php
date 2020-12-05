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

    $idPar=$_SESSION['role']=='admin'?null:$_SESSION['idPart'];
    $user=new Worker(null,$_POST['firstname'],$_POST['lastname'],$_POST['code'],$_POST['phone'],$_POST['area'],$_POST['idPart'],null);

    if(Fworker::checkCodeWorker($_POST['code']))
    {
        $res=Fworker::addNewWorker($user);
        if(is_numeric($res))
        {
            $_SESSION['done']="Worker added Successfully";
            header('Location: ../newWorker.php');
        }else{
            $_SESSION['err']="Impossible to add this Worker";
            header('Location: ../newWorker.php');
        }
    }else
    {
        $_SESSION['err']="Id Worker already Taken";
        header('Location: ../newWorker.php');
    }



}else
{
    $_SESSION['err']="fill all case ";
    header('Location: ../addNewUser.php');
}