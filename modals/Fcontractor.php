<?php
include_once 'Worker.php';
include_once 'Database.php';

class Fcontractor
{

    static function addNewContractor(Contractor $partner)
    {   // Function to add a new contractor in the system

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

    static function updateContractor(Contractor $partner)
    {   // Function to update a contrator in the system

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
    {   // Function to get the list of all the contractors

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM partners p, admin a WHERE p._idPart=a.idPart');
        $req->execute(array());
        return $req->fetchAll();
    }

    static function getOneContractorById($idPart)
    {   // Fucntion to get inforamtion on a specific contractor

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM partners WHERE _idPart=?');
        $req->execute(array($idPart));
        return $req->fetch();
    }

    static function checkNameContractor($namePart)
    {   // Function to check in the contractor name already exist in the system to avoid name confusion

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM partners WHERE namePart=?');
        $req->execute(array($namePart));

        if($req->rowCount()==0)
        {
            return true;
        }
        return false;
    }

    static function deleteContractor($idPart)
    {   // Function to delete a contractor

        $con=Database::getConnection();
        $req_1=$con->prepare('DELETE  FROM partners WHERE _idPart=?');
        $req_2=$con->prepare('DELETE  FROM admin WHERE idPart=?');
        $req_3=$con->prepare('DELETE  FROM workers WHERE idPart=?');
        $req_1->execute(array($idPart));
        $req_2->execute(array($idPart));
        $req_3->execute(array($idPart));

    }


}