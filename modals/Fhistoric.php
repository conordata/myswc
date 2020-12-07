<?php
include_once 'Historic.php';
include_once 'Trash.php';
include_once 'Database.php';

class Fhistoric
{

    static function addNewHistoric(Historic  $historic)
    {
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
    {
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

    static function updateHistoricByDate(Historic $historic)
    {

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic  WHERE idTrash=? ORDER BY _idHisto DESC');
        $req->execute(array($historic->getIdTrash()));
        foreach($req->fetchAll() as $data)
        {
            $explode=explode(' ',$data['dateHisto']);
            echo var_dump($explode);

            if($explode[0]==date('Y-m-d'))
            {
                    $req=$con->prepare('UPDATE historic SET level=?,weight=?,dateFull=?,idUser=?,dateEmpty=? WHERE idTrash=? AND _idHisto=?');
                    $req->execute(array(
                      
                        $historic->getLevel(),
                        $historic->getWeigth(),
                        $historic->getDateFull(),
                        $historic->getIdUser(),
                        $historic->getDateEmpty(),
                        $historic->getIdTrash(),
                        $data['_idHisto']
                    ));
                    exit();
                echo $explode[0];
            }
        }
        
    }

    static function updateDateEmptyAndUser($idTrash,$idUser)
    {

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic  WHERE idTrash=? ORDER BY _idHisto DESC');
        $req->execute(array($idTrash));
        foreach($req->fetchAll() as $data)
        {
            $explode=explode(' ',$data['dateFull']);
            //echo var_dump($explode);

            if($explode[0]==date('Y-m-d'))
            {
                $req=$con->prepare('UPDATE historic SET idUser=?,dateEmpty=? WHERE idTrash=? AND _idHisto=?');
                $req->execute(array(
                    $idUser,
                    date('Y-m-d H:i:s'),
                    $idTrash,
                    $data[' les ']
                ));
                exit();
                echo $explode[0];
            }
        }

    }
    static function getOneHistoricOfTrash($idTrash)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic WHERE idTrash=? AND dateEmpty IS NULL');
        $req->execute(array($idTrash));
        return $req->fetch();
    }

    static function getAllHistoric()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t,users u WHERE c.idTrash=t.idTrash AND u.code=c.idUser ORDER BY c.dateFull DESC');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function getAllHistoricCollectionDay()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t,users u WHERE c.idTrash=t.idTrash AND u.code=c.idUser AND DATE(dateHisto)=?');
        $req->execute(array(date('Y-m-d')));
        return $req->fetchAll();
    }

    static function getAllHistoricCollection()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t,users u WHERE c.idTrash=t.idTrash AND u.code=c.idUser');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function checkidTrash($code)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash WHERE idTrash=?');
        $req->execute(array($code));
        if($req->rowCount()==0)
        {
            return true;
        }
        return false;
    }
    
    static function getAllHistoricDay()
    {
        /* Get historic of bin for status monitoring */

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t WHERE c.idTrash=t.idTrash AND dateEmpty IS NULL');
        $req->execute(array());
        return $req->fetchAll();
    }


    static function getAllHistoricDayFull()
    {
        /* Update the time when the bin level reaches a preset value*/

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t WHERE c.idTrash=t.idTrash AND dateFull IS NOT NULL AND dateEmpty IS NULL ORDER BY dateFull ASC');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function checkIfHistoricTrashIsSave($idTras)
    {
        $con=Database::getConnection();

        $req=$con->prepare('SELECT * FROM historic WHERE idTrash=? AND dateEmpty IS NULL');
        $req->execute(array($idTras));
        if($req->rowCount()>0)
        {
            return true;
        }
        return false;
    }

}