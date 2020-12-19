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

    if (Fcontractor::checkNameContractor($_POST['name'])) {
    
	    $partner=new Contractor($_POST['idPart'],$_POST['name'],$_POST['area'],$_POST['address'],$_POST['phone'],null);
	    Fcontractor::updateContractor($partner);
	    $_SESSION['done']=" Contractor Updated Successfully";
    }

    else {
    	$_SESSION['err']="Contractor name alredy taken";
    }

    header('Location: ../editContractor.php?idPart='.$_POST['idPart']);
}else
{
    $_SESSION['err']="Something Went Wrong !";
    header('Location: ../editContractor.php?idPart='.$_POST['idPart']);
}