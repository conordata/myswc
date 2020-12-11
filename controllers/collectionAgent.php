<?php
if(!isset($_SESSION))
{
    session_start();
}

    if (isset($_POST['date_start'],$_POST['date_end'])&& !empty($_POST['date_start'])&& !empty($_POST['date_end'])) 
    {
    	$_SESSION['dateStart']=$_POST['date_start'];
        $_SESSION['dateEnd']=$_POST['date_end'];

        header("location: ../collectionAgent.php");
    }

