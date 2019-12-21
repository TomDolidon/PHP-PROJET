<?php


class Secteur
{

    //private Int $_id;
    //private String $_libelle;

    private $_id;
    private $_libelle;
    /**
     * Secteur constructor.
     * @param $_id
     * @param $_libelle
     */
    public function __construct($_id, $_libelle)
    {
        $this->_id = $_id;
        $this->_libelle = $_libelle;
    }

    /**
     * @return Int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param Int $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return String
     */
    public function getLibelle()
    {
        return $this->_libelle;
    }

    /**
     * @param String $libelle
     */
    public function setLibelle($libelle)
    {
        $this->_libelle = $libelle;
    }




    public function __toString()
    {
        return "Secteur : $this->_libelle";
    }


}