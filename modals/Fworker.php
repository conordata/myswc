<?php

include_once 'Database.php';
include_once 'Worker.php';
class Fworker
{

    static function addNewWorker(Worker $user)
    {
        $con=Database::getConnection();
        $req=$con->prepare('INSERT INTO workers SET firstname=?,lastname=?,idWorker=?,phone=?,area=?,idPart=?');
        $req->execute(array(
            $user->getFirstname(),
            $user->getLastname(),
            $user->getidWorker(),
            $user->getPhone(),
            $user->getArea(),
            $user->getIdPart()
        ));
        return $con->lastInsertId();
    }

    static function updateWorker(Worker $user, $user_1)
    {

        $con=Database::getConnection();
        $req_1=$con->prepare('UPDATE workers SET firstname=?,lastname=?,idWorker=?,phone=?,area=?,idPart=? WHERE _idUser=?');
        $req_2=$con->prepare('UPDATE historic SET idUser=? WHERE idUser=?');
        
        $req_1->execute(array(
            $user->getFirstname(),
            $user->getLastname(),
            $user->getidWorker(),
            $user->getPhone(),
            $user->getArea(),
            $user->getIdPart(),
            $user->getId()
        ));
        $req_2->execute(array(
            $user->getidWorker(),
            $user_1
        ));

    }
    static function deleteWorker($idUSer)
    {
        $con=Database::getConnection();
        $req=$con->prepare('DELETE FROM workers WHERE _idUser=?');
        $req->execute(array($idUSer));

    }

    static function getWorkerById($idUser)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM workers WHERE _idUser=?');
        $req->execute(array($idUser));
        return $req->fetch();

    }

    static function checkidWorker($idWorker)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM workers WHERE idWorker=?');
        $req->execute(array($idWorker));

        if($req->rowCount()==0)
        {
            return true;
        }
        return false;
    }

    static function getIdWorker($idUser)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT idPart FROM workers WHERE _idUser=? OR idWorker=?');
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
        $req=$con->prepare('SELECT * FROM workers WHERE idPart=?');
        $req->execute(array($idPart));
        return $req->fetchAll();
    }
    static function getUserForOneWorker($idPat)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM workers WHERE idPart=?');
        $req->execute(array($idPat));
        return $req->fetchAll();
    }
}