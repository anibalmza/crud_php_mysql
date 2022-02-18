<?php

include("db.php");

if (isset($_POST['guardar_tarea'])){
    // echo "Guardando";
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    // echo $titulo;
    // echo $descripcion;
    $query = "INSERT INTO tarea(titulo, descrip ) VALUES ('$titulo', '$descripcion')";
    // $datos = [$titulo, $descripcion];
    // $query = "INSERT INTO tarea(titulo, descrip) VALUES(?,?)", $datos;

    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Query Falied");
    }
    
    $_SESSION['message'] = 'Tarea Guardada Exitosamente';
    $_SESSION['message_type'] = 'success';
    
    header("location: index.php");
}
?>