<?php
require_once './core/Modelo.php';
class Tarea extends Modelo{
    private $_id;
    private $_nombre;
    private $_fechaVencimiento;
    private $_estado = 1; # Pendiente

    private $_tabla = 'tareas';

    public function __construct($id=null, $nombre=null, $fechaVencimiento=null){
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_fechaVencimiento = $fechaVencimiento;

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
            "nombre"=>"'$this->_nombre'",
            "fecha_vence"=>"'$this->_fechaVencimiento'",
            "estados_id"=>"$this->_estado"
        );
    }

}