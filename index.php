<?php include("db.php") ?>

<?php include("includes/header.php") ?>
    
<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <!-- mostrar mensaje  -->
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); }?>

        </div>

        <div class="col-mx-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones &nbsp &nbsp
                             <a href="create_task.php" class="btn btn-primary">
                                <i class="fa-solid fa-circle-plus"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tarea";
                        $result_tareas = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tareas)){ ?>
                            <tr>
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['descrip'] ?></td>
                                <td><?php echo $row['creacion'] ?></td>
                                <td>
                                    <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>                            
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>