<?php


if(isset($_GET['idAdmin'],$_GET['idPart']) && !empty($_GET['idAdmin']))
{
    include_once '../modals/Fadmin.php';

    $admin=Fadmin::checkLastAdmin($_GET['idPart']);
    $adminInfo=Fadmin::getInfoAdminById($_GET['idAdmin']);

    if ($adminInfo['role']!="monitor") {
    	
    	if($admin>1) {
    		Fadmin::deleteAdmin($_GET['idAdmin']);
    	}
	}

	else Fadmin::deleteAdmin($_GET['idAdmin']);
    

    header('Location: ../listAdmin.php');


}
else{
    header('Location: ../listAdmin.php');
}