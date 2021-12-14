<?php

include("db.php");

if (isset($_POST['save_servicio'])){
    $nombre = $_POST['nombre'];

   $query = "INSERT INTO servicio_tipos(nombre) VALUES ('$nombre')";
   $result = mysqli_query($conn,$query);

   if (!$result) {
       die("Fallo Query");
   }
}

$_SESSION['message'] = 'Servicio Guardado';
$_SESSION['message_type'] = 'success';
header("Location: index.php");

?>