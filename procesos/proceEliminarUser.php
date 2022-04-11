<?php
        include_once('../conexion/conexion.php');
        session_start();
        $id = $_REQUEST["id"];

        $QUERYdel = "DELETE from usuario WHERE usuarioID='$id'";
        $rsQUERYdel = mysqli_query($con, $QUERYdel) or die('Error: ' . mysqli_error($con));
        if($rsQUERYdel == true){
            header('Location: ../inicio.php');
            exit();
        }
        if($rsQUERYdel == false){
            echo 'Error no se pudo Eliminar';
            echo '<a href="inicio.php">Regresar</a>';
        }
        mysqli_close($con);
?>