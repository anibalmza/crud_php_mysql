<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h2>Crear una Tarea</h2>

            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); }?>

           
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo Tarea" autofocus>
                    </div>
                    <br/>
                    <div class="form-group">
                        <textarea name="descripcion" rows="3" class="form-control" placeholder="Descripción Tarea"></textarea>
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar">
                </form>
            </div>
        </div> 
    </div>
</div>

<?php include("includes/footer.php") ?>