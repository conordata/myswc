<?php


class Partner
{

    private $id;
    private $namePart;
    private $town;
    private $addresse;
    private $phone;
    private $datePart;

    /**
     * Partner constructor.
     * @param $id
     * @param $namePart
     * @param $town
     * @param $addresse
     * @param $phone
     * @param $datePart
     */
    public function __construct($id, $namePart, $town, $addresse, $phone, $datePart)
    {
        $this->id = $id;
        $this->namePart = $namePart;
        $this->town = $town;
        $this->addresse = $addresse;
        $this->phone = $phone;
        $this->datePart = $datePart;
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
    public function getNamePart()
    {
        return $this->namePart;
    }

    /**
     * @param mixed $namePart
     */
    public function setNamePart($namePart)
    {
        $this->namePart = $namePart;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town)
    {
        $this->town = $town;
    }

    /**
     * @return mixed
     */
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * @param mixed $addresse
     */
    public function setAddresse($addresse)
    {
        $this->addresse = $addresse;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getDatePart()
    {
        return $this->datePart;
    }

    /**
     * @param mixed $datePart
     */
    public function setDatePart($datePart)
    {
        $this->datePart = $datePart;
    }




}