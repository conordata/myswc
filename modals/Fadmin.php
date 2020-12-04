<?php

include_once 'Admin.php';
include_once 'Database.php';

class Fadmin
{

    static function addNewAdmin(Admin $admin)
    {
        $con=Database::getConnection();
        $req=$con->prepare('INSERT INTO admin SET username=?,password=?,role=?,idPart=?');
        $req->execute(array(
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
        $req=$con->prepare('SELECT * FROM admin');
        $req->execute(array());
        return $req->fetchAll();
    }
    static function deleteAdmin($idAdmin)
    {
        $con=Database::getConnection();
        $req=$con->prepare('DELETE FROM admin WHERE _idAdmin=?');
        $req->execute(array($idAdmin));

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
        $req=$con->prepare('UPDATE admin SET username=?,password=?,role=? WHERE _idAdmin=?');
        $req->execute(array(
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
}