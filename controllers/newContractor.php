<?php
if(!isset($_SESSION))
{
    session_start();
}


if(isset($_POST['name'],$_POST['area'],$_POST['address'],$_POST['phone'])
&& !empty($_POST['name']) && !empty($_POST['area']) && !empty($_POST['address']) && !empty($_POST['phone']))
{
    include_once '../modals/Contractor.php';
    include_once '../modals/Fcontractor.php';
    include_once '../modals/Admin.php';
    include_once '../modals/Fadmin.php';

    $partner=new Contractor(null,$_POST['name'],$_POST['area'],$_POST['address'],$_POST['phone'],null);

    if (Fcontractor::checkNameContractor($_POST['name'])) {

        $res=Fcontractor::addNewContractor($partner);
       
        $username=substr($_POST['name'],0,3).''.rand(99,999);
        $password='12345';
        $idPart=$res;
        $admin=new Admin(null,$_POST['name'],"",$username,'contractor',$password,$idPart);
        if(is_numeric($res))
        {
            $res=Fadmin::addNewAdmin($admin);
            $_SESSION['done']="New Contractor added successfully";
            header('Location: ../newContractor.php');
        }else
        {
            $_SESSION['err']="Imppossible to add this contractor";
            header('Location: ../newContractor.php.php');
        }
    }
    else {
        $_SESSION['err']="Contractor name alredy taken";
            header('Location: ../newContractor.php');
    }
}
else
{
    $_SESSION['err']="Please Complete all Field";
    header('Location: ../newContractor.php.php');
}