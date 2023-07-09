<?php
require_once './core/Modelo.php';
class Estado extends Modelo{
    private $_tabla = 'estados';

    public function __construct(){
        parent::__construct($this->_tabla);
    }

}