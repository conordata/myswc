<?php
include_once 'Historic.php';
include_once 'Trash.php';
include_once 'Database.php';

class Fhistoric
{

    static function addTrash(Trash $trash)
    {
        $con=Database::getConnection();
        $req=$con->prepare('INSERT INTO trash SET longi=?,lat=?,address=?,codeTrash=?,typeTrash=?');
        $req->execute(array(
            $trash->getLong(),
            $trash->getLat(),
            $trash->getAddress(),
            $trash->getCodeTrash(),
            $trash->getTypeTrash()
        ));
        return $con->lastInsertId();
    }
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
        $con=Database::getConnection();
        $req=$con->prepare('UPDATE historic SET idTrash=?,level=?,weight=?,dateFull=?,idUser=?,dateEmpty=? WHERE _idHisto=?');
        $req->execute(array(
            $historic->getIdTrash(),
            $historic->getLevel(),
            $historic->getWeigth(),
            $historic->getDateFull(),
            $historic->getIdUser(),
            $historic->getDateEmpty(),
            $historic->getId()
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
        $req=$con->prepare('SELECT * FROM historic WHERE idTrash=? AND DATE(dateHisto)=?');
        $req->execute(array($idTrash,date('Y-m-d')));
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
        $req=$con->prepare('SELECT * FROM historic c,trash t,users u WHERE c.idTrash=t.codeTrash AND u.code=c.idUser AND DATE(dateHisto)=?');
        $req->execute(array(date('Y-m-d')));
        return $req->fetchAll();
    }

    static function getAllHistoricCollection()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t,users u WHERE c.idTrash=t.codeTrash AND u.code=c.idUser');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function checkCodeTrash($code)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash WHERE codeTrash=?');
        $req->execute(array($code));
        if($req->rowCount()==0)
        {
            return true;
        }
        return false;
    }
    
    static function getAllHistoricDay()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t WHERE c.idTrash=t.codeTrash AND DATE(dateHisto)=? ');
        $req->execute(array(date('Y-m-d')));
        return $req->fetchAll();
    }


    static function getAllHistoricDayFull()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM historic c,trash t WHERE c.idTrash=t.codeTrash AND DATE(dateHisto)=? AND dateEmpty IS NOT NULL');
        $req->execute(array(date('Y-m-d')));
        return $req->fetchAll();
    }

    static function checkIfHistoricTrashIsSave($idTras)
    {
        $con=Database::getConnection();

        $req=$con->prepare('SELECT * FROM historic WHERE idTrash=? AND DATE(dateHisto)=?');
        $req->execute(array($idTras,date('Y-m-d')));
        if($req->rowCount()>0)
        {
            return true;
        }
        return false;
    }

}