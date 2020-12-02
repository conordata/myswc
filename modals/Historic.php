<?php


class Historic
{

    private $id;
    private $idTrash;
    private $level;
    private $weigth;
    private $idUser;
    private $dateFull;
    private $dateEmpty;

    /**
     * Historic constructor.
     * @param $id
     * @param $idTrash
     * @param $level
     * @param $weigth
     * @param $idUser
     * @param $dateFull
     * @param $dateEmpty
     */
    public function __construct($id, $idTrash, $level, $weigth, $idUser, $dateFull, $dateEmpty)
    {
        $this->id = $id;
        $this->idTrash = $idTrash;
        $this->level = $level;
        $this->weigth = $weigth;
        $this->idUser = $idUser;
        $this->dateFull = $dateFull;
        $this->dateEmpty = $dateEmpty;
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
    public function getIdTrash()
    {
        return $this->idTrash;
    }

    /**
     * @param mixed $idTrash
     */
    public function setIdTrash($idTrash)
    {
        $this->idTrash = $idTrash;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getWeigth()
    {
        return $this->weigth;
    }

    /**
     * @param mixed $weigth
     */
    public function setWeigth($weigth)
    {
        $this->weigth = $weigth;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getDateFull()
    {
        return $this->dateFull;
    }

    /**
     * @param mixed $dateFull
     */
    public function setDateFull($dateFull)
    {
        $this->dateFull = $dateFull;
    }

    /**
     * @return mixed
     */
    public function getDateEmpty()
    {
        return $this->dateEmpty;
    }

    /**
     * @param mixed $dateEmpty
     */
    public function setDateEmpty($dateEmpty)
    {
        $this->dateEmpty = $dateEmpty;
    }

}