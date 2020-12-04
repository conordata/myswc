<?php


if(isset($_GET['idAdmin']) && !empty($_GET['idAdmin']))
{
    include_once '../modals/Fadmin.php';

    Fadmin::deleteAdmin($_GET['idAdmin']);

    header('Location: ../listAdmin.php');

}
else{
    header('Location: ../listAdmin.php');
}