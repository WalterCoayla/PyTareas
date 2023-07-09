<?php
require_once "./persistencia/EntidadBase.php";
class Modelo extends EntidadBase{

    public function __construct($tabla=null){
        if ($tabla != null){
            # $this->_tabla=(string) $tabla;
            parent::__construct($tabla);
        }
    }

}