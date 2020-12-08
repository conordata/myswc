<?php

if(!isset($_SESSION))
{
    session_start();
}


if(isset($_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['password'],$_POST['role'],$_POST['idPart'])
    && !empty($_POST['firstname'])&& !empty($_POST['lastname'])&& !empty($_POST['username'])&& !empty($_POST['password']))
{
    include_once '../modals/Fadmin.php';


    $admin=new Admin(null,$_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['role'],$_POST['password'],$_POST['idPart']);

    if(Fadmin::checkUsername($_POST['username']))
    {
        $res=Fadmin::addNewAdmin($admin);
        if(is_numeric($res))
        {
            $_SESSION['done']="User Added successfully";
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
    $_SESSION['err']="Blank case !";
    header('Location: ../newAdmin.php');
}