<?php


class Entreprise extends Structure
{

   // private Int $_nbActionnaires;
    private $_nbActionnaires;

    /**
     * Entreprise constructor.
     * @param Int $_nbActionnaires
     */
    public function __construct( $_nbActionnaires)
    {
        $this->_nbActionnaires = $_nbActionnaires;
    }

    /**
     * @return Int
     */
    public function getNbActionnaires()
    {
        return $this->_nbActionnaires;
    }

    /**
     * @param Int $nbActionnaires
     */
    public function setNbActionnaires($nbActionnaires)
    {
        $this->_nbActionnaires = $nbActionnaires;
    }




    public function __toString(){
        return parent::__toString().", Nombre d'actionnaires : $this->_nbActionnaires ";
    }



}