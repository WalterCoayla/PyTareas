<?php
require_once './core/Modelo.php';
class Progreso extends Modelo{
    private $_id;
    private $_descripcion;
    private $_fecha;
    private $_comentario;
    private $_esCompleta = 0; 
    private $_tareasID;

    private $_tabla = 'tareas_progreso';

    private $_vista = 'v_progreso';

    public function __construct($id=null, $descripcion=null, $fecha=null,
                        $comentario=null, $esCompleta=null,$tareasID=null
                ){
        $this->_id = $id;
        $this->_descripcion = $descripcion;
        $this->_fecha = $fecha;
        $this->_comentario = $comentario;
        $this->_esCompleta = $esCompleta;
        $this->_tareasID = $tareasID;

        parent::__construct($this->_tabla);

    }
    public function listar(){
        $this->setTabla($this->_vista);
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
            "descripcion"=>"'$this->_descripcion'",
            "fecha"=>"'$this->_fecha'",
            "comentario"=>"'$this->_comentario'",
            "tareas_id"=>"$this->_tareasID",
            "esCompleta"=>"$this->_esCompleta"
        );
    }


    public function getProgresoXTarea($id){
        $sql = "Select * FROM ". $this->_vista
                . " WHERE idTarea=$id";
        # var_dump($sql);exit;
        $this->setSql($sql);
        return $this->ejecutarSql();
    }
}