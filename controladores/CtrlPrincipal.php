<?php
require_once './core/Controlador.php';

class CtrlPrincipal extends Controlador{
    public function index(){
        # echo "Saludos desde CtrlPrincipal";
        $datos = array(
            'nombres'=>"Walter "
        );

        $this->mostrar('principal.php',$datos);
    }
}