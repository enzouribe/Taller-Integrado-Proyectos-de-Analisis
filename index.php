<?php include("db.php") ?>

<?php include("includes/header.php") ?> 

<div class="container p-4">
 
    <div class="row">

        <div class="col-md-4">

            <?php if(isset($_SESSION['message'] )) { ?>        
              
                 <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>

            <?php session_unset();  } ?>
             

            

            <div class="card card-body">
                <form action="save_tservicio.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control"
                        placeholder="Ingrese Nombre del Servicio" autofocus>
                         
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="save_servicio" value="Guardar">
                </form>



            </div>

        </div>

        <div class="col-md-8">
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Servicio</th>
                        <th>Creado el</th>
                        <th>Acciones</th>
                    </tr>
                </thead>   
                  <tbody>
                     <?php
                     $query = "SELECT * FROM servicio_tipos";
                     $result_servicios = mysqli_query($conn, $query);

                     while($row = mysqli_fetch_array($result_servicios)) {?>
                        <tr>
                            <td> <?php echo $row['id'] ?></td>
                            <td> <?php echo $row['nombre'] ?></td>
                            <td> <?php echo $row['created_at'] ?></td>  
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-pen-alt"></i>
                                </a>
                                <a href="">   </a>
                                <a href="delete_tservicio.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>                         
                        </tr>

 
                     <?php } ?>
                  </tbody>


        </div>

    </div>

</div>

<?php include("includes/footer.php") ?>


    