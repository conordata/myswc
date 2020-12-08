<?php

if(!isset($_SESSION))
{
    session_start();
}


if(isset($_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password'],$_POST['role'],$_POST['idPart'])
    && !empty($_POST['firstname'])&& !empty($_POST['lastname'])&& !empty($_POST['username'])&& !empty($_POST['password']))
{
    include_once '../modals/Admin.php';
    include_once '../modals/Fadmin.php';

    $admin=new Admin($_POST['idAdmin'],$_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['role'],$_POST['password'],$_POST['idPart']);

    Fadmin::updateAdmin($admin);

    $_SESSION['done']="Admin Updated successfully";

    header('Location: ../editAdmin.php?idAdmin='.$_POST['idAdmin']);
}else
{
    $_SESSION['err']="Somthing Went Wrong !";
    header('Location: ../editAdmin.php?idAdmin='.$_POST['idAdmin']);
}