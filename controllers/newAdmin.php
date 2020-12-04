<?php

if(!isset($_SESSION))
{
    session_start();
}


if(isset($_POST['username'],$_POST['password'],$_POST['role'],$_POST['idPart'])
    && !empty($_POST['username'])&& !empty($_POST['password']))
{
    include_once '../modals/Fadmin.php';
    include_once '../modals/Fuser.php';

    $admin=new Admin(null,$_POST['username'],$_POST['role'],$_POST['password'],$_POST['idPart']);
    if(Fadmin::checkUsername($_POST['username']))
    {
        $res=Fadmin::addNewAdmin($admin);
        if(is_numeric($res))
        {
            $_SESSION['done']="Username and Password added successfully";
            header('Location: ../newAdmin.php');
        }else
        {
            $_SESSION['err']="Somthing ?";
            header('Location: ../newAdmin.php');
        }
    }else{
        $_SESSION['err']="Username already taken";
        header('Location: ../newAdmin.php');
    }


}else
{
    $_SESSION['err']="Somthing wrong";
    header('Location: ../newAdmin.php');
}