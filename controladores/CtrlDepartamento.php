<?php
require_once './core/Controlador.php';
require_once './modelos/Departamento.php';
class CtrlDepartamento extends Controlador
{
    public function index(){

        $this->listar();

    }
    public function editar(){
        
        $id = $_GET['id'];
        # echo "Editando....".$id;
        $obj= new Departamento();

        $miObj = $obj->getBy('id',$id);
        # var_dump($miObj);exit;
        $datos = array(
            'departamento'=>$miObj['data'][0]
        );
        # var_dump($datos);exit;
        $this->mostrar('departamentos/formulario.php',$datos);
    }
    public function guardar(){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];

        $obj= new Departamento($id, $nombre,$descripcion);

        if ($id==''){
            $respuesta = $obj->nuevo();
        } else {    # Editar
            $respuesta = $obj->editar();
        }
        
        $this->listar();
    }
    public function nuevo(){
        $this->mostrar('departamentos/formulario.php');
    }

    public function eliminar(){

        $id = $_GET['id'];
        $obj= new Departamento($id);

        $respuesta = $obj->eliminar();

        $this->listar();

    }

    public function listar(){

        $obj= new Departamento();

        $data = $obj->listar();
        
        $datos = array(
            'data'=>$data['data']
        );

        $this->mostrar('departamentos/mostrar.php',$datos);

    }
}