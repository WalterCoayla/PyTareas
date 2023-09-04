<?php
require_once './core/Controlador.php';
require_once './modelos/Tarea.php';
class CtrlTarea extends Controlador
{
    public function index(){

        $this->listar();

    }
    public function editar(){
        
        $id = $_GET['id'];
        # echo "Editando....".$id;
        $obj= new Tarea();

        $miObj = $obj->getBy('id',$id);
        # var_dump($miObj);exit;
        $datos = array(
            'tarea'=>$miObj['data'][0]
        );
        # var_dump($datos);exit;
        $this->mostrar('tareas/formulario.php',$datos);
    }
    public function guardar(){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $fecha=$_POST['fecha'];

        $obj= new Tarea($id, $nombre,$fecha);

        if ($id==''){
            $respuesta = $obj->nuevo();
        } else {    # Editar
            $respuesta = $obj->editar();
        }
        
        $this->listar();
    }
    public function nuevo(){
        $this->mostrar('tareas/formulario.php');
    }

    public function eliminar(){

        $id = $_GET['id'];
        $obj= new Tarea($id);

        $respuesta = $obj->eliminar();

        $this->listar();

    }

    public function listar(){

        $obj= new Tarea();

        $data = $obj->listar();
        
        $datos = array(
            'data'=>$data['data']
        );

        $this->mostrar('tareas/mostrar.php',$datos);

    }
}