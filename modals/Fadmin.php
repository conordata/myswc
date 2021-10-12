<?php

include_once 'Admin.php';
include_once 'Database.php';

class Fadmin
{

    static function addNewAdmin(Admin $admin)
    {   //Function to add a new admin to the system

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

    static function updateAdmin(Admin $admin)
    {   // Function to update a specific admin

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

    static function checkUsername($username)
    {   //Function to check if a username already exist in the database

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
    {   // Function to get all the contractor admin

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin a, partners p WHERE a.idPart=p._idPart');
        $req->execute(array());
        return $req->fetchAll();
    }

     static function getAllAdminOrg($idPart)
    {   // Function to get all the admin of a specific organization 

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin WHERE idPart=?');
        $req->execute(array($idPart));
        return $req->fetchAll();
    }

      static function getAdminByOrg($idPart)
    {   // Function to get all the admin of a specific organization and their organization

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin a, partners p WHERE a.idPart=p._idPart AND idPart=?');
        $req->execute(array($idPart));
        return $req->fetchAll();
    }

    static function getInfoAdminById($idAdmin)
    {   // Function to get information on a specific admin

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin WHERE _idAdmin=?');
        $req->execute(array($idAdmin));
        return $req->fetch();
    }
    
    static function login($username,$password)
    {   // Function to Login

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
    {   // Function to check the number of admin in the system in order to avoid deleting all the admin

        $con=Database::getConnection();
        $req=$con->prepare('SELECT * FROM admin WHERE idPart=? AND role!=?');
        $req->execute(array($idPart,'monitor'));

        return $req->rowCount();
    }


    static function deleteAdmin($idAdmin)
    {   // Function to delete an admin from the system

        $con=Database::getConnection();
        $req=$con->prepare('DELETE FROM admin WHERE _idAdmin=?');
        $req->execute(array($idAdmin));

    }
}