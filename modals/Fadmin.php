<?php

include_once 'Admin.php';
include_once 'Database.php';

class Fadmin
{

    static function addNewAdmin(Admin $admin)
    {
        $con=Database::getConnection();
        $req=$con->prepare('INSERT INTO admin SET firstname=?,lastname=?,username=?,password=?,role=?,idPart=?');
        $req->execute(array(
            $admin->getFirstname(),
            $admin->getLastname(),
            $admin->getUsername(),
            sha1($admin->getPassword()),
            $admin->getRole(),
            $admin->getDateCreated()
        ));
        return $con->lastInsertId();
    }

    static function checkUsername($username)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin WHERE username=?');
        $req->execute(array($username));
        if($req->rowCount()==0)
        {
            return true;
        }
        return false;
    }

   
    static function getAllAdmin()
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin a, partners p WHERE a.idPart=p._idPart');
        $req->execute(array());
        return $req->fetchAll();
    }

     static function getAllAdminOrg($idPart)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin WHERE idPart=?');
        $req->execute(array($idPart));
        return $req->fetchAll();
    }
      static function getAdminByOrg($idPart)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin a, partners p WHERE a.idPart=p._idPart AND idPart=?');
        $req->execute(array($idPart));
        return $req->fetchAll();
    }

    static function getInfoAdminById($idAdmin)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin WHERE _idAdmin=?');
        $req->execute(array($idAdmin));
        return $req->fetch();
    }

    static function updateAdmin(Admin  $admin)
    {
        $con=Database::getConnection();
        $req=$con->prepare('UPDATE admin SET firstname=?,lastname=?,username=?,password=?,role=? WHERE _idAdmin=?');
        $req->execute(array(
            $admin->getFirstname(),
            $admin->getLastname(),
            $admin->getUsername(),
            sha1($admin->getPassword()),
            $admin->getRole(),
            $admin->getId()
        ));
    }

    static function login($username,$password)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin WHERE username=? AND password=?');
        $req->execute(array($username,sha1($password)));
        if($req->rowCount()==0)
        {
            return false;
        }
        return $req->fetch();
    }

    static function checkLastAdmin($idPart)
    {
        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin WHERE idPart=? AND role!=?');
        $req->execute(array($idPart,'monitor'));

        return $req->rowCount();
    }


     static function deleteAdmin($idAdmin)
    {
        $con=Database::getConnection();
        $req=$con->prepare('DELETE FROM admin WHERE _idAdmin=?');
        $req->execute(array($idAdmin));

    }
}