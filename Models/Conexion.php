<?php
namespace Models;

use PDO;
use stdClass;

class Conexion extends PDO
{
    private $datos = array(
        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "db" => "proyecto"
    );


    public function __construct()
    {
        parent::__construct(
            "mysql:host=".$this->datos['host'].";dbname=".$this->datos['db']."",
            $this->datos['user'],
            $this->datos['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }


    public function save(string $table, array $data): ?stdClass
    {
        $columns = implode(',', array_keys($data));

        $values = implode(',', array_map(function ($item) {
            return ":${item}";
        }, \array_keys($data)));

        $stm = $this->prepare(
            \sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values)
        );

        if ($stm->execute($data)) {
            return (object)\array_merge(
                ['id' => $this->lastInsertId()],
                $data
            );
        } else {
            return null;
        }
    }

    public function findAlumno(string $table, array $whereData)
    {
        $where =array_map(function ($item) {
            return "t1.${item}=:${item}";
        }, array_keys($whereData));

        $stm = $this->prepare(sprintf("SELECT t1.* ,t2.nombre as nombre_seccion FROM %s t1 INNER JOIN secciones t2 on t1.id_seccion = t2.id WHERE %s ", $table, \implode(" AND ", $where)));
        $stm->bindParam(":id", $whereData["id"], PDO::PARAM_INT);
        $stm->bindParam(":estado", $whereData["estado"]);

        if ($stm->execute()) {
            return $stm->fetchObject();
        } else {
            return "error";
        }
    }

    public function findSeccion(string $table, array $whereData)
    {
        $where =array_map(function ($item) {
            return "${item}=:${item}";
        }, array_keys($whereData));

        $stm = $this->prepare(sprintf("SELECT *  FROM %s  WHERE %s ", $table, \implode(" AND ", $where)));
        $stm->bindParam(":id", $whereData["id"], PDO::PARAM_INT);
        $stm->bindParam(":estado", $whereData["estado"]);

        if ($stm->execute()) {
            return $stm->fetchObject();
        } else {
            return "error";
        }
    }


    public function delete(string $table, array $whereData)
    {
        $where = array_map(function ($item) {
            return "${item}=:${item}";
        }, array_keys($whereData));

        $stm = $this->prepare(\sprintf("DELETE FROM %s WHERE %s", $table, implode(" AND ", $where)));
        $stm->bindParam(":id", $whereData['id'], PDO::PARAM_INT);

        if ($stm->execute()) {
            return "correcto";
        } else {
            return "error";
        }
    }

    public function update(string $table, array $data, array $whereData)
    {
        $set = implode(",", \array_map(
            function ($item) {
                return "${item}=:${item}";
            },
            \array_keys($data)
        ));

        $where = \array_map(
            function ($item) {
                return "${item}=:${item}";
            },
            \array_keys($whereData)
        );
        
        $stm = $this->prepare(
            \sprintf("UPDATE %s SET %s WHERE %s", $table, $set, \implode(' AND ', $where))
        );

        if ($stm->execute(\array_merge($data, $whereData))) {
            return "correcto";
        } else {
            return "error";
        }
    }

    
    public function list($sql)
    {
        $stm = $this->prepare($sql);
        if ($stm->execute()) {
            return $stm->fetchAll();
        } else {
            return "error";
        }
    }
}
