<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
</head>

<body>

    <?php
    
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath(dirname(__FILE__)).DS);
    define('URL', "http://localhost:8080/PHP/Proyecto/");

    require_once "Config/Autoload.php";
    Config\Autoload::run();
    require_once "Views/template.php";
    Config\Enrutador::run(new Config\Request());

    //$est = new Models\Estudiante;

    //$est->id = 25;
    //$est->nombre = 'Informatica';
    //$est->edad = 15;
    //$est->promedio = 10.5;
   // $est->imagen = 'http://image.jpg';
    //$est->id_seccion = 1;
    //$est->fecha = '2019-09-10 00:00:00';

    //agregar
    //echo "<pre>";
    //print_r($est->add());
    // exit();

    //list
    //$datos=$est->view();
    //print ($datos->id);
    //print ($datos->nombre);
    //print ($datos->nombre_seccion);
    //print ($datos->edad);
    //print ($datos->promedio);
    //print ($datos->imagen);
    //print ($datos->id_seccion);
    //print ($datos->fecha);

    //actualizar
    //echo "<pre>";
    //$est->edit();

    //eliminar
    //$est->del();

    
    //buscar
    //$datos =$est->getData();
    //print($datos->id);
    //print($datos->nombre);
    //print($datos->estado);
    //print($datos->promedio);
    //print($datos->imagen);
    //print($datos->id_seccion);
    //print($datos->fecha);
   ?> 
    </body>
    </html>