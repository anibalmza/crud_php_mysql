<?php

include("db.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "DELETE FROM tarea WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Query Falied");
    }

    $_SESSION['message'] = 'Tarea Eliminada Exitosamente';
    $_SESSION['message_type'] = 'danger';
    
    header("location: index.php");
}
?>