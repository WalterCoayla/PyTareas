<?php
require_once './core/Controlador.php';
require_once './modelos/Empleado.php';
require_once './modelos/Cargo.php';
require_once './modelos/Departamento.php';

class CtrlEmpleado extends Controlador
{
    public function index(){

        $this->listar();

    }
    public function editar(){

        $obj = new Cargo;
        $dataCargo = $obj->listar()['data'];

        $obj = new Departamento;
        $dataDpto = $obj->listar()['data'];
        
        $id = $_GET['id'];
        # echo "Editando....".$id;
        $obj= new Empleado();

        $miObj = $obj->getBy('id',$id);
        # var_dump($miObj);exit;
        $datos = array(
            'empleado'=>$miObj['data'][0],
            'cargos'=>$dataCargo,
            'departamentos'=>$dataDpto
        );
        # var_dump($datos);exit;
        $this->mostrar('empleados/formulario.php',$datos);
    }
    public function guardar(){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $cargo=$_POST['cargo'];
        $departamento=$_POST['departamento'];

        $obj= new Empleado($id, $nombre,$apellido,$email,$cargo,$departamento);

        if ($id==''){
            $respuesta = $obj->nuevo();
        } else {    # Editar
            $respuesta = $obj->editar();
        }
        
        $this->listar();
    }
    public function nuevo(){
        $obj = new Cargo;
        $dataCargo = $obj->listar()['data'];

        $obj = new Departamento;
        $dataDpto = $obj->listar()['data'];

        $datos = [
            'cargos'=>$dataCargo,
            'departamentos'=>$dataDpto
        ];

        $this->mostrar('empleados/formulario.php',$datos);
    }

    public function eliminar(){

        $id = $_GET['id'];
        $obj= new Empleado($id);

        $respuesta = $obj->eliminar();

        $this->listar();

    }

    public function listar(){

        $obj= new Empleado();

        $respuesta = $obj->listar();
        
        $datos = array(
            'data'=>$respuesta['data']
        );

        $this->mostrar('empleados/mostrar.php',$datos);

    }
    public function misTareas(){
        require_once './modelos/Tarea.php';
        $id = $_GET['id'];
        $obj = new Tarea;
        $respuesta= $obj->getTareasxEmp($id);
        # var_dump($respuesta);exit;
        $datos = array(
            'titulo'=>'Mis Tareas',
            'nombre'=>$_GET['empleado'],
            'id'=>$_GET['id'],
            'data'=>$respuesta['data']
        );

        $this->mostrar('empleados/misTareas.php',$datos);
    }
    public function asignarTarea(){
        echo "Asignando tarea";
        $id = $_GET['id']; #Empleado
        $idTarea = $_GET['idTarea']; #Empleado
        $obj = new Tarea;
        $respuesta = $obj->asignarTarea($idTarea,$id);
        $this->nuevaTarea();
    }
    public function nuevaTarea(){
        require_once './modelos/Tarea.php';
        $id = $_GET['id']; #Empleado
        $obj = new Tarea;
        $tareasDisponibles = $obj->TareasDisponibles();
        # var_dump($tareasDisponibles);exit;
        $datos = array(
            'titulo'=>'Mis Tareas',
            'id'=>$id,
            'data'=>$tareasDisponibles['data']
        );

        $this->mostrar('empleados/tareasDisponibles.php',$datos);
    }
    public function seleccionarSupervisor(){
        $obj= new Empleado($_GET['id']);

        $respuesta = $obj->getSupervisores();
        
        $datos = array(
            'data'=>$respuesta['data'],
            'empleado'=>$_GET['id']
        );

        $this->mostrar('empleados/seleccionarSupervisor.php',$datos);
    }
    public function asignarSupervisor(){
        $id = $_GET['id'];
        $obj= new Empleado($id);
        $idSupervisor=$_POST['supervisor'];
        # var_dump($id);exit;
        $respuesta = $obj->setSupervisor($idSupervisor);
        $this->index();
    }
    
}