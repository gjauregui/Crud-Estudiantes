<?php
namespace Models;

class Seccion
{
    private $id;
    private $nombre;
    private $con;

    public function __construct()
    {
        $this->con = new Conexion();
    }


    public function __set($atributo, $contenido)
    {
        if (\property_exists($this, $atributo)) {
            $this->$atributo = $contenido;
        }
    }

    public function __get($atributo)
    {
        if (\property_exists($this, $atributo)) {
            return $this->$atributo;
        }
        return null;
    }

    public function save()
    {
        return  $this->con->save('secciones', [
                    'nombre'=>$this->nombre,
                    "estado"=>true
        ]);
    }

    public function find()
    {
        return  $this->con->findSeccion(
            "secciones",
            [
                "id"=>$this->id,
                "estado"=>true
            ]
        );
    }

    public function delete()
    {
        $this->con->delete(
            "secciones",
            [
                "id"=>$this->id
            ]
        );
    }

    public function update()
    {
        $this->con->update(
            "secciones",
            [
            "nombre"=>$this->nombre],
            [
            "id"=> $this->id
            ]
        );
    }

    public function list()
    {
        $sql = "SELECT * FROM secciones";
        return $this->con->list($sql);
    }
}
