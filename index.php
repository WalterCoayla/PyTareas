<?php
abstract class Index
{
    public static function ejecutar(){
        $controlador = isset ($_GET['ctrl'])?$_GET['ctrl']:'CtrlPrincipal';

        switch ($controlador) {
            case 'CtrlPrueba':
                require_once './controladores/CtrlPrueba.php';
                $c = new CtrlPrueba();
                break;
            case 'CtrlEstado':
                require_once './controladores/CtrlEstado.php';
                $c = new CtrlEstado();
                break;
            
            default: # CtrlPrincipal
                require_once './controladores/CtrlPrincipal.php';
                $c = new CtrlPrincipal();
                break;
        }
        $c->index();    # Metodo por DEFECTO de TODO controlador
        
    }
}

Index::ejecutar();