<?php


    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];    
        $query = "DELETE FROM servicio_tipos WHERE id = $id";
        $result = mysqli_query($conn,$query);
    }

    if (!$result) {
        die("Fallo Query");
    }

    $_SESSION['message'] = 'Servicio  Eliminado';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
?>
