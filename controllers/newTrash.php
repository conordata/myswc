<?php

if(!isset($_SESSION))
{
    session_start();
}
if(isset($_POST['long'],$_POST['lat'],$_POST['address'],$_POST['idTras'])
    && !empty($_POST['long'])&& !empty($_POST['lat'])&& !empty($_POST['address'])&& !empty($_POST['idTras']))
{
    include_once '../modals/Trash.php';
    include_once '../modals/Fhistoric.php';

    $trash=new Trash(null,$_POST['long'],$_POST['lat'],$_POST['address'],$_POST['idTras'],$_POST['type'],null);

    if(Fhistoric::checkidTrash($_POST['idTras']))
    {
        $res=Fhistoric::addTrash($trash);
        if(is_numeric($res))
        {
            $_SESSION['done']="Trash added successfully";
            header('Location: ../newTrash.php');
        }else
        {
            $_SESSION['err']="Impossible to add this trash";
            header('Location: ../newTrash.php');
        }

    }else
    {
        $_SESSION['err']="Id trash already used";
        header('Location: ../newTrash.php');
    }

}else
{
    $_SESSION['err']="blank case refused";
    header('Location: ../newTrash.php');
}