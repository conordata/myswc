<?php

if(!isset($_SESSION))
{
    session_start();
}
if(isset($_POST['long'],$_POST['lat'],$_POST['address'],$_POST['codeTras'])
    && !empty($_POST['long'])&& !empty($_POST['lat'])&& !empty($_POST['address'])&& !empty($_POST['codeTras'])&& !empty($_POST['area']))
{
    include_once '../modals/Trash.php';
    include_once '../modals/Ftrash.php';

    $trash=new Trash($_POST['idTrash'],$_POST['long'],$_POST['lat'],$_POST['address'],$_POST['area'],$_POST['codeTras'],$_POST['type'],null);

    Ftrash::updateTrash($trash);

    $_SESSION['done']="Trash Updated Successfully";
    header('Location: ../editTrash.php?idTrash='.$_POST['idTrash']);
}else
{
    $_SESSION['err']="Blank Case !";
    header('Location: ../editTrash.php?idTrash='.$_POST['idTrash']);
}