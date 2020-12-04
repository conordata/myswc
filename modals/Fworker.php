<?php
include_once 'Worker.php';
include_once 'Database.php';

class Fpartner
{

    static function addNewPartner(Partner  $partner)
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

    static function updatePartner(Partner  $partner)
    {
        $con=Database::getConnection();
        $req=$con->prepare('UPDATE partners SET namePart=?,town=?,address=?,phone=? WHERE _idPart=?');
        $req->execute(array(
            $partner->getNamePart(),
            $partner->getTown(),
            $partner->getAddresse(),
            $partner->getPhone(),
            $partner->getId()
        ));

    }

    static function getAllPartner()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM partners');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function deletePartner($idPart)
    {
        $con=Database::getConnection();
        $req=$con->prepare('DELETE  FROM partners WHERE _idPart=?');
        $req->execute(array($idPart));

    }

    static function getOnePartnerById($idPart)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM partners WHERE _idPart=?');
        $req->execute(array($idPart));
        return $req->fetch();
    }



}