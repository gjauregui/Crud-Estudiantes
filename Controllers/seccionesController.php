<?php namespace Controllers;

use Models\Seccion as Seccion;

class seccionesController
{
    private $secciones;

    public function __construct(){
        $this->secciones = new Seccion();
    }

    public function index()
    {
        $datos = $this->secciones->list();
        return $datos;
    }
    public function agregar()
    {
        if($_POST){
            $this->secciones->nombre = $_POST['nombre'];
            $this->secciones->save();
            header('Location: '.URL."secciones");
        }
      
    }

    public function eliminar($id){
        $this->secciones->id = $id;
        $this->secciones->delete();
        header("location: ". URL ."secciones");
    }

    public function editar($id){

        if(!$_POST){
            $this->secciones->id=$id;
            $datos = $this->secciones->find();
            return $datos;
        }else {
     
            $this->secciones->id=$_POST['id'];
            $this->secciones->nombre = $_POST['nombre'];
            $this->secciones->update();
            header("location: ".URL."secciones");
        }
      
    }
}
