<?php
include_once 'Database.php';
include_once 'Trash.php';

class Ftrash
{

    static function addNewTrash(Trash $trash)
    {
        $con = Database::getConnection();
        $req = $con->prepare('INSERT INTO trash (longi,lat,address,area,idTrash,typeTrash) VALUES(?,?,?,?,?,?)');
        $req->execute(array(
            $trash->getLong(),
            $trash->getLat(),
            $trash->getAddress(),
            $trash->getArea(),
            $trash->getIdTrash(),
            $trash->getTypeTrash()
        ));
        return $con->lastInsertId();
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
    
    static function updateTrash(Trash $trash)
    {
        $con = Database::getConnection();
        $req = $con->prepare('UPDATE trash SET longi=?,lat=?,address=?,area=?,idTrash=?,typeTrash=? WHERE _idTrash=?');
        $req->execute(array(
            $trash->getLong(),
            $trash->getLat(),
            $trash->getAddress(),
            $trash->getArea(),
            $trash->getidTrash(),
            $trash->getTypeTrash(),
            $trash->getId()
        ));
    }

    static function deleteTrash($idTrash)
    {
        $con=Database::getConnection();
        $req=$con->prepare('DELETE FROM trash WHERE _idTrash=?');
        $req->execute(array($idTrash));
    }

    static function getAllTrash()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash ORDER BY idTrash ASC');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function getTrashByType($type)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash WHERE typeTrash=?');
        $req->execute(array($type));
        return $req->fetchAll();
    }

    static function getTrashById($idTrash)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash WHERE _idTrash=?');
        $req->execute(array($idTrash));
        return $req->fetch();
    }

}