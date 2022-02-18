<?php

include("db.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "SELECT * FROM tarea WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $titulo = $row['titulo'];
        $descrip = $row['descrip'];
    }

    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descrip = $_POST['descrip'];

        $query = "UPDATE tarea SET titulo = '$titulo', descrip = '$descrip' WHERE id = $id";

        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Tarea Actualizada Exitosamente';
        $_SESSION['message_type'] = 'warning';

        header("location: index.php");
    }
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto" >
            <h2>Editar una Tarea</h2>
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>"
                        class="form-control" placeholder="Actualiza el Título">
                    </div>
                    <br/>
                    <div class="form-group">
                        <textarea name="descrip" rows="3" class="form-control" placeholder="Actualiza la Descripción"> <?php echo $descrip; ?> </textarea>
                    </div>
                    <br/>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>