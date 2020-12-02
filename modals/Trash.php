<?php


class Trash
{

    private $id;
    private $long;
    private $lat;
    private $address;
    private $codeTrash;
    private $typeTrash;
    private $dateTrash;

    /**
     * Trash constructor.
     * @param $id
     * @param $long
     * @param $lat
     * @param $address
     * @param $codeTrash
     * @param $typeTrash
     * @param $dateTrash
     */
    public function __construct($id, $long, $lat, $address, $codeTrash, $typeTrash, $dateTrash)
    {
        $this->id = $id;
        $this->long = $long;
        $this->lat = $lat;
        $this->address = $address;
        $this->codeTrash = $codeTrash;
        $this->typeTrash = $typeTrash;
        $this->dateTrash = $dateTrash;
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
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param mixed $long
     */
    public function setLong($long)
    {
        $this->long = $long;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCodeTrash()
    {
        return $this->codeTrash;
    }

    /**
     * @param mixed $codeTrash
     */
    public function setCodeTrash($codeTrash)
    {
        $this->codeTrash = $codeTrash;
    }

    /**
     * @return mixed
     */
    public function getDateTrash()
    {
        return $this->dateTrash;
    }

    /**
     * @param mixed $dateTrash
     */
    public function setDateTrash($dateTrash)
    {
        $this->dateTrash = $dateTrash;
    }

    /**
     * @return mixed
     */
    public function getTypeTrash()
    {
        return $this->typeTrash;
    }

    /**
     * @param mixed $typeTrash
     */
    public function setTypeTrash($typeTrash)
    {
        $this->typeTrash = $typeTrash;
    }

}