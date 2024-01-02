<?php
require_once './core/Controlador.php';
require_once './modelos/Tarea.php';
require_once './modelos/Estado.php';
require_once './modelos/Empleado.php';
require_once './modelos/Progreso.php';

class CtrlTarea extends Controlador
{
    public function index(){

        $this->listar();

    }
    public function editar(){

        $obj = new Estado;
        $dataEstado = $obj->listar()['data'];

        $obj = new Empleado;
        $dataEmpleado = $obj->listar()['data'];

        
        $id = $_GET['id'];
        # echo "Editando....".$id;
        $obj= new Tarea();

        $miObj = $obj->getBy('id',$id);
        # var_dump($miObj);exit;
        $datos = array(
            'tarea'=>$miObj['data'][0],
            'estados'=>$dataEstado,
            'empleados'=>$dataEmpleado
        );
        # var_dump($datos);exit;
        $this->mostrar('tareas/formulario.php',$datos);
    }
    public function guardar(){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $fecha=$_POST['fecha'];
        $empleado=$_POST['empleado'];
        $estado=$_POST['estado'];

        $obj= new Tarea($id, $nombre,$fecha,$empleado,$estado);

        if ($id==''){
            $respuesta = $obj->nuevo();
        } else {    # Editar
            $respuesta = $obj->editar();
        }
        
        $this->listar();
    }
    public function nuevo(){
        $obj = new Estado;
        $dataEstado = $obj->listar()['data'];

        $obj = new Empleado;
        $dataEmpleado= $obj->listar()['data'];

        $datos= [
            'estados'=>$dataEstado,
            'empleados'=>$dataEmpleado
        ];

        $this->mostrar('tareas/formulario.php',$datos);
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
    public function verProgreso(){
        $id = $_GET['id'];
        $obj  = new Progreso();
        $data = $obj->getProgresoXTarea($id);
        # var_dump($data);exit;
         $datos = array(
            'data'=>$data['data']
        );

        $this->mostrar('tareas/mostrarProgreso.php',$datos);

    }
    public function asignarTarea(){
        // echo "Asignando tarea<br>";
        
        // var_dump($_GET);
        $obj = new Empleado;
        $dataEmpleado = $obj->listar()['data'];

        $datos = array(
            'empleados'=>$dataEmpleado,
            'tarea'=>$_GET['tarea'],
            'idtarea'=>$_GET['id']
        );

        $this->mostrar('tareas/seleccionarEmpleado.php',$datos);

    }
    public function asignarTareaAEmpleado (){
        // echo "Asignando tarea";
       // var_dump($_POST);
       $obj = new Tarea ($_POST['idTarea']);
       $obj->asignarAEmpleado($_POST['idEmpleado']);

        $this->listar();

    }
}