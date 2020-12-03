<?php
include_once 'Database.php';
include_once 'Trash.php';

class Ftrash
{

    static function addNewTrash(Trash $trash)
    {
        $con = Database::getConnection();
        $req = $con->prepare('INSERT INTO trash (longi,lat,address,codeTrash,typeTrash) VALUES(?,?,?,?,?)');
        $req->execute(array($trash->getLong(),$trash->getLat(), $trash->getAddress(),$trash->getCodeTrash(),$trash->getTypeTrash()));
        return $con->lastInsertId();
    }

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


    static function updateTrash(Trash $trash)
    {
        $con = Database::getConnection();
        $req = $con->prepare('UPDATE trash SET longi=?,lat=?,address=?,codeTrash=?,typeTrash=? WHERE _idTrash=?');
        $req->execute(array(
            $trash->getLong(),
            $trash->getLat(),
            $trash->getAddress(),
            $trash->getCodeTrash(),
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
        $req=$con->prepare('SELECT * FROM trash');
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