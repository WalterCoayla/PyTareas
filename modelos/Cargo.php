<?php
require_once './core/Modelo.php';
class Cargo extends Modelo{
    private $_id;
    private $_nombre;
    private $_descripcion;

    private $_tabla = 'cargos';

    public function __construct($id=null, $nombre=null, $descripcion=null){
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_descripcion = $descripcion;

        parent::__construct($this->_tabla);

    }
    public function listar(){
        return $this->getAll();
    }
    public function eliminar(){
        return $this->deleteBy('id',$this->_id);
    }

    public function nuevo(){
        $datos = $this->_getDatos();

        return $this->insert($datos);
    }
    public function editar(){

        $datos = $this->_getDatos();
        
        $wh = "id = $this->_id";

        return $this->update($wh, $datos);

    }
    private function _getDatos(){
        return array(
            "cargo"=>"'$this->_nombre'",
            "descripcion"=>"'$this->_descripcion'"
        );
    }

}