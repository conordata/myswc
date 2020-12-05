<?php
include_once 'Worker.php';
include_once 'Database.php';

class Fcontractor
{

    static function addNewContractor(Contractor  $partner)
    {
        $con=Database::getConnection();
        $req=$con->prepare('INSERT INTO partners SET namePart=?,area=?,address=?,phone=?');
        $req->execute(array(
            $partner->getNamePart(),
            $partner->getTown(),
            $partner->getAddresse(),
            $partner->getPhone()
        ));
        return $con->lastInsertId();
    }

    static function updateContractor(Contractor  $partner)
    {
        $con=Database::getConnection();
        $req=$con->prepare('UPDATE partners SET namePart=?,area=?,address=?,phone=? WHERE _idPart=?');
        $req->execute(array(
            $partner->getNamePart(),
            $partner->getTown(),
            $partner->getAddresse(),
            $partner->getPhone(),
            $partner->getId()
        ));

    }

    static function getAllContractor()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM partners p, admin a WHERE p._idPart=a.idPart');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function deleteContractor($idPart)
    {
        $con=Database::getConnection();
        $req_1=$con->prepare('DELETE  FROM partners WHERE _idPart=?');
        $req_2=$con->prepare('DELETE  FROM admin WHERE idPart=?');
        $req_1->execute(array($idPart));
        $req_2->execute(array($idPart));

    }

    static function getOneContractorById($idPart)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM partners WHERE _idPart=?');
        $req->execute(array($idPart));
        return $req->fetch();
    }



}