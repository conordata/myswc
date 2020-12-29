<?php
include_once 'Database.php';
include_once 'Trash.php';

class Ftrash
{

    static function addNewTrash(Trash $trash)
    {   // Function to add a new trash bin in the system

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

    static function updateTrash(Trash $trash)
    {   // Function to update a trash bin already in the system

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

    static function checkidTrash($code)
    {   // Function to check if the trash ID exists in the system

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash WHERE idTrash=?');
        $req->execute(array($code));
        if($req->rowCount()==0)
        {
            return true;
        }
        return false;
    }

    static function getAllTrash()
    {   // Function to get the list of all the registered trash bins

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash ORDER BY idTrash ASC');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function getTrashById($idTrash)
    {   // Function to get information of a specific trash bin (by ID)

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM trash WHERE _idTrash=?');
        $req->execute(array($idTrash));
        return $req->fetch();
    }

    static function deleteTrash($idTrash)
    {   // Funcion to delete a trash bin from the system

        $con=Database::getConnection();
        $req=$con->prepare('DELETE FROM trash WHERE _idTrash=?');
        $req->execute(array($idTrash));
    }

}