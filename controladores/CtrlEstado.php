<?php
require_once './core/Controlador.php';
require_once './modelos/Estado.php';
class CtrlEstado extends Controlador
{
    public function index(){
        $obj= new Estado();
        $data=$obj->getAll();
        # var_dump($data);
        $datos = array(
            'data'=>$data['data']
        );

        $this->mostrar('estados/mostrar.php',$datos);

    }
}