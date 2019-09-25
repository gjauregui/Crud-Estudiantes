<?php
namespace Models;

class Estudiante
{
    private $id;
    private $nombre;
    private $edad;
    private $promedio;
    private $imagen;
    private $id_seccion;
    private $fecha;
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

        return $this;
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
        $time = time();
        $this->fecha = date("Y-m-d (H:i)", $time);

        return $this->con->save('estudiantes', [
            'nombre' =>$this->nombre,
            'edad'   =>$this->edad,
            'promedio'=>$this->promedio,
            'imagen' =>$this->imagen,
            'id_seccion'=>$this->id_seccion,
            'fecha'  =>$this->fecha,
            'estado' => true
        ]);
    }

    
    public function find()
    {
        return $this->con->findAlumno('estudiantes', [
                        "id"=>$this->id,
                        "estado" => true
        ]);
    }


    public function delete()
    {
        $this->con->delete(
            'estudiantes',
            [
            "id"=>$this->id
            ]
        );
    }


    public function update()
    {
        $this->con->update(
            'estudiantes',
            [
                'nombre'=>$this->nombre,
                'edad'=>$this->edad,
                'promedio'=>$this->promedio,
                'id_seccion'=>$this->id_seccion
            ],
            ['id'=>$this->id]
        );
    }
    

    public function list()
    {
        $sql = "SELECT t1.*,t2.nombre as nombre_seccion FROM estudiantes t1 INNER JOIN secciones t2 on t1.id_seccion = t2.id";
        return  $this->con->list($sql);
    }
}
