<?php

if(!isset($_SESSION))
{
    session_start();
}
if(isset($_POST['long'],$_POST['lat'],$_POST['address'],$_POST['idTras'],$_POST['area'])
    && !empty($_POST['long'])&& !empty($_POST['lat'])&& !empty($_POST['address'])&& !empty($_POST['idTras'])&& !empty($_POST['area']))
{
    include_once '../modals/Trash.php';
    include_once '../modals/Ftrash.php';

    $trash=new Trash(null,$_POST['long'],$_POST['lat'],$_POST['address'],$_POST['area'],$_POST['idTras'],$_POST['type'],null);

    if(Ftrash::checkidTrash($_POST['idTras']))
    {
        $res=Ftrash::addNewTrash($trash);
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
        $_SESSION['err']="Trash Id already used";
        header('Location: ../newTrash.php');
    }

}else
{
    $_SESSION['err']="Blank Case !";
    header('Location: ../newTrash.php');
}