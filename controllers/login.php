<?php
if(!isset($_SESSION))
{
    session_start();
}


if(isset($_POST['username'],$_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']))
{
    include_once '../modals/Fadmin.php';

    $data=Fadmin::login($_POST['username'],$_POST['password']);

    if(!$data)
    {
        $_SESSION['err']="Username or password invalide";
        header('Location: ../login.php');
    }else{
        $_SESSION['username']=$data['username'];
        $_SESSION['role']=$data['role'];
        $_SESSION['idPart']=$data['idPart'];

        header('Location: ../dashboard.php');
    }
}else
{
    $_SESSION['err']="Please complete all fill";
    header('Location: ../login.php');
}