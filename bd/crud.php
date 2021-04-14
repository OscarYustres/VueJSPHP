<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
// $id_pelicula = (isset($_POST['id_pelicula'])) ? $_POST['id_pelicula'] : '';
$Caratula = (isset($_POST['Caratula'])) ? $_POST['Caratula'] : '';
$Titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : '';
$Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : '';
$Duracion = (isset($_POST['Duracion'])) ? $_POST['Duracion'] : '';
$Categoria = (isset($_POST['Categoria'])) ? $_POST['Categoria'] : '';
$Trailer = (isset($_POST['Trailer'])) ? $_POST['Trailer'] : '';
$vista = (isset($_POST['vista'])) ? $_POST['vista'] : '';
$calificacion = (isset($_POST['calificacion'])) ? $_POST['calificacion'] : '';
$Fecha_estreno = (isset($_POST['Fecha_estreno'])) ? $_POST['Fecha_estreno'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO peliculas (Caratula, Titulo, Descripcion, Duracion, Categoria, Trailer, Fecha_estreno) VALUES('$Caratula', '$Titulo', '$Descripcion', '$Duracion', '$Categoria', '$Trailer', '$Fecha_estreno') ";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                
        break;
    case 2:
        $consulta = "UPDATE cine SET vista='$vista' WHERE id_pelicula='$id_pelicula' ";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "UPDATE cine SET Calificacion='$Calificacion' WHERE id_pelicula='$id_pelicula' ";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;         
    case 4:
        $consulta = "SELECT Caratula, Titulo, Descripcion, Duracion, Categoria, Trailer, vista, calificacion, Fecha_estreno FROM cine";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;