<?php

include_once 'Database.php';
include_once 'Worker.php';
class Fworker
{

    static function addNewWorker(Worker $user)
    {   // Function to add a new worker in the system

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
    {   // Function to update worker in the system (in worker and historic tables)

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

    static function checkidWorker($idWorker)
    {   // Function to check if the worker ID exists in the system

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM workers WHERE idWorker=?');
        $req->execute(array($idWorker));

        if($req->rowCount()==0)
        {
            return true;
        }
        return false;
    }

    static function getWorkerById($idUser)
    {   // Function to get information on a specific worker

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM workers WHERE _idUser=?');
        $req->execute(array($idUser));
        return $req->fetch();

    }

    static function getAllWorkers($idPart)
    {   // Function to get all the worker of a specific organization

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM workers WHERE idPart=?');
        $req->execute(array($idPart));
        return $req->fetchAll();
    }

    static function deleteWorker($idUSer)
    {   // Function to delete a specific worker from the system
        
        $con=Database::getConnection();
        $req=$con->prepare('DELETE FROM workers WHERE _idUser=?');
        $req->execute(array($idUSer));

    }

}