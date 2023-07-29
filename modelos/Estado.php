<?php
require_once './core/Modelo.php';
class Estado extends Modelo{
    private $_id;
    private $_estado;

    private $_tabla = 'estados';

    public function __construct($id=null, $estado=null){
        $this->_id = $id;
        $this->_estado = $estado;

        parent::__construct($this->_tabla);

    }
    public function listar(){
        return $this->getAll();
    }
    public function eliminar(){
        return $this->deleteBy('id',$this->_id);
    }

    public function nuevo(){
        $datos = array(
            "estado"=>"'$this->_estado'"
        );
        return $this->insert($datos);
    }
    public function editar(){
        $datos = array(
            "estado"=>"'$this->_estado'"
        );
        
        $wh = "id = $this->_id";

        return $this->update($wh, $datos);

    }

}