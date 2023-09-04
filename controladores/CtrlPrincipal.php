<?php
require_once './core/Controlador.php';

class CtrlPrincipal extends Controlador{
    public function index(){
        # echo "Saludos desde CtrlPrincipal";
        $datos = array(
            'menu'=>array(
                'CtrlPrincipal'=>'Inicio',
                'CtrlEstado'=>'Estados',
                'CtrlDepartamento'=>'Departamentos',
                'CtrlCargo'=>'Cargos',
                'CtrlEmpleado'=>'Empleados',
                'CtrlTarea'=>'Tareas',

            )
        );

        $this->mostrar('principal.php',$datos);
    }
}