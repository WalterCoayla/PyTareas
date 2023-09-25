<?php
require_once './core/Modelo.php';
class Empleado extends Modelo{
    private $_id;
    private $_nombres;
    private $_apellidos;
    private $_avatar;
    private $_email;
    private $_clave;

    private $_cargo;
    private $_departamento;

    private $_tabla = 'empleados';

    private $_vista = 'v_empleados';

    public function __construct($id=null, $nombres=null, $apellidos=null
                        , $email=null, $cargo=null, $departamento=null){
        $this->_id = $id;
        $this->_nombres = $nombres;
        $this->_apellidos = $apellidos;
        $this->_email = $email;
        $this->_cargo = $cargo;
        $this->_departamento = $departamento;

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
        $datos = array(
            "nombres"=>"'$this->_nombres'",
            "apellidos"=>"'$this->_apellidos'",
            "email"=>"'$this->_email'",
            "cargos_id"=>"$this->_cargo",
            "departamentos_id"=>"$this->_departamento"
        );
        return $this->insert($datos);
    }
    public function editar(){
        $datos = array(
            "nombres"=>"'$this->_nombres'",
            "apellidos"=>"'$this->_apellidos'",
            "email"=>"'$this->_email'",
            "cargos_id"=>"$this->_cargo",
            "departamentos_id"=>"$this->_departamento"
        );
        
        $wh = "id = $this->_id";

        return $this->update($wh, $datos);

    }

}