<?php

include_once 'Database.php';
include_once 'Worker.php';
class Fworker
{

    static function addNewWorker(Worker $user)
    {
        $con=Database::getConnection();
        $req=$con->prepare('INSERT INTO users SET firstname=?,lastname=?,code=?,phone=?,area=?,idPart=?');
        $req->execute(array(
            $user->getFirstname(),
            $user->getLastname(),
            $user->getCode(),
            $user->getPhone(),
            $user->getArea(),
            $user->getIdPart()
        ));
        return $con->lastInsertId();
    }

    static function updateWorker(Worker $user)
    {

        $con=Database::getConnection();
        $req=$con->prepare('UPDATE users SET firstname=?,lastname=?,code=?,phone=?,area=?,idPart=? WHERE _idUser=?');
        $req->execute(array(
            $user->getFirstname(),
            $user->getLastname(),
            $user->getCode(),
            $user->getPhone(),
            $user->getArea(),
            $user->getIdPart(),
            $user->getId()
        ));

    }
    static function deleteWorker($idUSer)
    {
        $con=Database::getConnection();
        $req=$con->prepare('DELETE FROM users WHERE _idUser=?');
        $req->execute(array($idUSer));

    }

    static function getWorkerById($idUser)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM users WHERE _idUser=?');
        $req->execute(array($idUser));
        return $req->fetch();

    }

    static function checkCodeWorker($code)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM users WHERE code=?');
        $req->execute(array($code));

        if($req->rowCount()==0)
        {
            return true;
        }
        return false;
    }

    static function getIdWorker($idUser)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT idPart FROM users WHERE _idUser=? OR code=?');
        $req->execute(array($idUser,$idUser));
        return $req->fetch()['idPart'];
    }

    static function checkIfIsContractorWorker($idUser)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT namePart FROM partners WHERE _idPart=?');
        $req->execute(array($idUser));
        return $req->fetch()['namePart'];
    }
    static function getAllWorkers($idPart)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM users WHERE idPart=?');
        $req->execute(array($idPart));
        return $req->fetchAll();
    }
    static function getUserForOneWorker($idPat)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM users WHERE idPart=?');
        $req->execute(array($idPat));
        return $req->fetchAll();
    }
}