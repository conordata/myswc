<?php
include_once 'Historic.php';
include_once 'Trash.php';
include_once 'Database.php';

class Fhistoric
{
    static function checkIfTrashExist($idTrash)
    {   // Checks if trash Exists in the system

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash WHERE idTrash=?');
        $req->execute(array($idTrash));
        if($req->rowCount()==0)
        {
            return false;
        }
        return true;
    }

    static function checkIfWorkerExist($idWorker)
    {   // Checks if worker Exists in the system
        
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM workers WHERE idWorker=?');
        $req->execute(array($idWorker));
        if($req->rowCount()==0)
        {
            return false;
        }
        return true;
    }

    static function checkIfHistoricTrashIsSave($idTras)
    {   // Checks if new Historic trash exists since the last emptying

        $con=Database::getConnection();

        $req=$con->prepare('SELECT * FROM historic WHERE idTrash=? AND dateEmpty IS NULL');
        $req->execute(array($idTras));
        if($req->rowCount()>0)
        {
            return true;
        }
        return false;
    }

    static function addNewHistoric(Historic  $historic)
    {   //Add new Historic trash after emptying

        $con=Database::getConnection();
        $req=$con->prepare('INSERT INTO historic SET idTrash=?,level=?,weight=?,dateFull=?,idUser=?,dateEmpty=?');
        $req->execute(array(
            $historic->getIdTrash(),
            $historic->getLevel(),
            $historic->getWeigth(),
            $historic->getDateFull(),
            $historic->getIdUser(),
            $historic->getDateEmpty()
        ));

        return $con->lastInsertId();
    }

    static function updateHistoric(Historic $historic)
    {   // Update Historic trash

        $timeUpdate=date("Y:m:d H:i:s");

        $con=Database::getConnection();
        $req=$con->prepare('UPDATE historic SET level=?,weight=?,dateFull=?,idUser=?,dateEmpty=?, lastUpdate=? WHERE idTrash=? AND dateEmpty IS NULL');
        $req->execute(array(
            $historic->getLevel(),
            $historic->getWeigth(),
            $historic->getDateFull(),
            $historic->getIdUser(),
            $historic->getDateEmpty(),
            $timeUpdate,
            $historic->getIdTrash()
        ));

    }

    static function updateDateEmptyAndUser($idTrash,$idUser)
    {   // Update date and time emptying and collector agent

        $timeEmpty=date("Y-m-d H:i:s");

        $con=Database::getConnection();
        $req=$con->prepare('UPDATE historic SET idUser=?,dateEmpty=? WHERE idTrash=? AND dateEmpty IS NULL');

        $req->execute(array($idUser,$timeEmpty,$idTrash));        
    }

    static function getOneHistoricOfTrash($idTrash)
    {   // Get Historic of one trash

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic WHERE idTrash=? AND dateEmpty IS NULL');
        $req->execute(array($idTrash));

        return $req->fetch();
    }

    static function getAllHistoricDay()
    {   /* Get all trash no emptied since the first garbage has been thrown in for status   monitoring */ 

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t WHERE c.idTrash=t.idTrash AND dateEmpty IS NULL');
        $req->execute(array());

        return $req->fetchAll();
    }

    static function getAllHistoricDayFull()
    {   // Get all trash that need to be collected (full)

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t WHERE c.idTrash=t.idTrash AND dateFull IS NOT NULL AND dateEmpty IS NULL ORDER BY dateFull ASC');
        $req->execute(array());

        return $req->fetchAll();
    }

    static function getAllHistoric()
    {   
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t,workers u WHERE c.idTrash=t.idTrash AND u.idWorker=c.idUser ORDER BY c.dateFull DESC');
        $req->execute(array());

        return $req->fetchAll();
    }

    
    static function getAllHistoricCollection($dateStart, $dateEnd)
    {   // Get All historic of collected bins in the range of dateStart to dateEnd

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,workers u,trash t WHERE c.idTrash=t.idTrash AND u.idWorker=c.idUser AND DATE(dateEmpty) BETWEEN ? AND ? ORDER BY t.idTrash ASC');
        $req->execute(array($dateStart, $dateEnd));
        
        return $req->fetchAll();
    }

    static function getAllHistoricCollectionAgent($dateStart, $dateEnd)
    {   // Get All historic of contractor collector agents in the range of dateStart to dateEnd

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c, partners p,workers u WHERE c.idUser=u.idWorker AND u.idPart=p._idPart AND DATE(dateEmpty) BETWEEN ? AND ? ORDER BY u.idWorker ASC');
        $req->execute(array($dateStart, $dateEnd));
        
        $historic=$req->fetchAll();

        $a=array();
        $b=array();


        foreach ($historic as $key => $data) {
            if (!in_array($data["idUser"], $a)) {

                array_push($a, $data["idUser"]);

                $weight=0;
                foreach ($historic as $j => $value) {
                    if ($value["idUser"]==$data["idUser"]) {
                        $weight=$weight+$value["weight"];
                    }
                }

                array_push($b, array(
                    "idUser"    => $data["idUser"],
                    "firstname" => $data["firstname"],
                    "lastname"  => $data["lastname"],
                    "area"      => $data["area"],
                    "namePart"    => $data["namePart"],
                    "weight"    => $weight
                ));
            }
        }            
        
        return $b;
    }

    static function getHistoricCollectionAgentByIdPart($dateStart, $dateEnd, $idPart)
    {   // Get All historic of contractor collector agents in the range of dateStart to dateEnd

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c, partners p,workers u WHERE c.idUser=u.idWorker AND u.idPart=p._idPart AND DATE(dateEmpty) BETWEEN ? AND ? AND ? ORDER BY u.idWorker ASC');
        $req->execute(array($dateStart, $dateEnd, $idPart));
        
        $historic=$req->fetchAll();

        $a=array();
        $b=array();


        foreach ($historic as $key => $data) {
            if (!in_array($data["idUser"], $a)) {

                array_push($a, $data["idUser"]);

                $weight=0;
                foreach ($historic as $j => $value) {
                    if ($value["idUser"]==$data["idUser"]) {
                        $weight=$weight+$value["weight"];
                    }
                }

                array_push($b, array(
                    "idUser"    => $data["idUser"],
                    "firstname" => $data["firstname"],
                    "lastname"  => $data["lastname"],
                    "area"      => $data["area"],
                    "namePart"  => $data["namePart"],
                    "weight"    => $weight
                ));
            }
        }            
        
        return $b;
    }

    static function getAllHistoricCollectionAgentInternal($dateStart, $dateEnd, $idPart)
    {   // Get All historic of municipal contractor agents in the range of dateStart to dateEnd

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,workers u WHERE c.idUser=u.idWorker AND DATE(dateEmpty) BETWEEN ? AND ? AND u.idPart=? ORDER BY u.idWorker ASC');
        $req->execute(array($dateStart, $dateEnd, $idPart));
        $historic=$req->fetchAll();
    
        $a=array();
        $b=array();


        foreach ($historic as $key => $data) {
            if (!in_array($data["idUser"], $a)) {

                array_push($a, $data["idUser"]);

                $weight=0;
                foreach ($historic as $j => $value) {
                    if ($value["idUser"]==$data["idUser"]) {
                        $weight=$weight+$value["weight"];
                    }
                }

                array_push($b, array(
                    "idUser"    => $data["idUser"],
                    "firstname" => $data["firstname"],
                    "lastname"  => $data["lastname"],
                    "area"      => $data["area"],
                    "weight"    => $weight
                ));
            }
        }            
        
        return $b;
    }


}