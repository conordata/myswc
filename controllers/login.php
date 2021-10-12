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
        $_SESSION['err']="Username or Password invalid";
        header('Location: ../login.php');
    }else{
        $_SESSION['username']=$data['username'];
        $_SESSION['fullname']=$data['lastname']." ".$data['firstname'];
        $_SESSION['role']=$data['role'];
        $_SESSION['idPart']=$data['idPart'];
        $_SESSION['dateStart']=date("Y-m-d", time());
        $_SESSION['dateEnd']=date("Y-m-d", time());

        header('Location: ../dashboard.php');
    }
}else
{
    $_SESSION['err']="Please complete all fill";
    header('Location: ../login.php');
}