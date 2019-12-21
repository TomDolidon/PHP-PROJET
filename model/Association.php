<?php

namespace Model\classe;

class Association extends Structure
{

    // private Int $_nbDonnateurs;
    private $_nbDonnateurs;


    public function __construct($_id, $_nom, $_rue, $_cp, $_ville, $_nbDonnateurs)
    {
        parent::__construct($_id, $_nom, $_rue, $_cp, $_ville);
        $this->_nbDonnateurs = $_nbDonnateurs;

    }

    /**
     * @return Int
     */
    public function getNbDonnateurs()
    {
        return $this->_nbDonnateurs;
    }

    /**
     * @param Int $nbDonnateurs
     */
    public function setNbDonnateurs($nbDonnateurs)
    {
        $this->_nbDonnateurs = $nbDonnateurs;
    }


    public function __toString(){
        return parent::__toString().", Nombre de donnateurs : $this->_nbActionnaires ";
    }


}