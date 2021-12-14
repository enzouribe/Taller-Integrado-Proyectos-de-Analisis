<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];    
        $query = "SELECT * FROM servicio_tipos WHERE id = $id";
        $result = mysqli_query($conn,$query);
    
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];

           
        } 
    
    }

    if (isset($_POST['Actualizar'])) {
         $id = $_GET['id'];
         $nombre = $_POST['nombre'];

         $query = "UPDATE servicio_tipos set nombre = '$nombre' WHERE id = $id";
         mysqli_query($conn, $query);         

         $_SESSION['message'] = 'Actualizado Satisfactoriamente';
         $_SESSION['message_type'] = 'info';

         header("Location: index.php");
    }



?>

<?php include("includes/header.php") ?>
 
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                             <input type="text" name= "nombre" value="<?php echo $nombre;?>" class="form-control" placeholder="Actualice Servicio">
                        </div>

                        <button class="btn btn-success" name="Actualizar">
                             Actualizar
                        </button>

                    </form>
                </div>

            </div>


        </div>


    </div>

<?php include("includes/footer.php") ?>