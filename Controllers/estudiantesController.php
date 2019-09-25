<?php

namespace Controllers;

use Models\Estudiante as Estudiante;
use Models\Seccion as Seccion;

class estudiantesController
{
    private $estudiante;
    private $seccion;

    public function __construct()
    {
        $this->estudiante = new Estudiante();
        $this->seccion = new Seccion();
    }

    public function index()
    {
        $datos = $this->estudiante->list();
        return $datos;
    }


    public function agregar(){
        if(!$_POST)
        {
            $datos = $this->seccion->list();
            return $datos;
        }else {
            $permitidas = array("image/jpeg","image/png","image/gif","image/jpg");
            $limite = 768;
            if(in_array($_FILES['imagen']['type'], $permitidas) && $_FILES['imagen']['size'] <= $limite * 1024){
                $nombre = date('is') . $_FILES['imagen']['name'];
                $ruta = "Views" . DS ."template" . DS . "imagenes" . DS . "avatars" . DS . $nombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
                $this->estudiante->nombre =$_POST['nombre'];
                $this->estudiante->edad =$_POST['edad'];
                $this->estudiante->promedio = $_POST['promedio'];
                $this->estudiante->imagen = $nombre;
                $this->estudiante->id_seccion = $_POST['id_seccion'];
                $this->estudiante->save();
                header("location: ". URL ."estudiantes");
            }
        }
       
    }

    public function editar($id){
        if(!$_POST)
        {
            $this->estudiante->id = $id;
            $datos = $this->estudiante->find();
            return $datos;
    
        }else {
            $this->estudiante->id = $_POST['id'];
            $this->estudiante->nombre =$_POST['nombre'];
            $this->estudiante->edad =$_POST['edad'];
            $this->estudiante->promedio = $_POST['promedio'];
            $this->estudiante->id_seccion = $_POST['id_seccion'];
            $this->estudiante->update();
            header("location: ". URL ."estudiantes");
        }      
    }

    
    public function listarSecciones (){
        $datos = $this->seccion->list();
        return $datos;
    }

    
    public function eliminar($id){
        $this->estudiante->id=$id;
        $this->estudiante->delete();
        header("location: ". URL ."estudiantes");
        
    }

    public function ver($id){
        $this->estudiante->id=$id;
        $datos = $this->estudiante->find();
        return $datos;
    }
 
}

