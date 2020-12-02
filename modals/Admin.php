<?php


class Admin
{

    private $id;
    private $username;
    private $role;
    private $password;
    private $dateCreated;

    /**
     * Admin constructor.
     * @param $id
     * @param $username
     * @param $role
     * @param $password
     * @param $dateCreated
     */
    public function __construct($id, $username, $role, $password, $dateCreated)
    {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
        $this->password = $password;
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }


}