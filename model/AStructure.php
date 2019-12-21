<?php

namespace Model\classe;

abstract class Structure
{

    // private Int $_id;
    // private String $_nom, $_rue, $_cp, $_ville;

    private $_id;
    private $_nom;
    private $_rue;
    private $_cp;
    private $_ville;

    /**
     * Structure constructor.
     * @param Int $_id
     * @param String $_nom
     * @param String $_rue
     * @param String $_cp
     * @param String $_ville
     */
    public function __construct(Int $_id, String $_nom, String $_rue, String $_cp, String $_ville)
    {
        $this->_id = $_id;
        $this->_nom = $_nom;
        $this->_rue = $_rue;
        $this->_cp = $_cp;
        $this->_ville = $_ville;
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
    public function setId(Int $id)
    {
        $this->_id = $id;
    }

    /**
     * @return String
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param String $nom
     */
    public function setNom(String $nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @return String
     */
    public function getRue()
    {
        return $this->_rue;
    }

    /**
     * @param String $rue
     */
    public function setRue(String $rue)
    {
        $this->_rue = $rue;
    }

    /**
     * @return String
     */
    public function getCp()
    {
        return $this->_cp;
    }

    /**
     * @param String $cp
     */
    public function setCp(String $cp)
    {
        $this->_cp = $cp;
    }

    /**
     * @return String
     */
    public function getVille()
    {
        return $this->_ville;
    }

    /**
     * @param String $ville
     */
    public function setVille(String $ville)
    {
        $this->_ville = $ville;
    }


    public function __toString(){

        return "Nom : $this->_nom, Rue : $this->_rue, Code postal : $this->_cp, Ville : $this->_ville";
    }

}