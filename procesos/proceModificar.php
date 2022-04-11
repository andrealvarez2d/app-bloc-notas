<?php
        include_once('../conexion/conexion.php');
        session_start();

        $id = $_POST['idNota'];
        $titulo = $_POST['tituloNota'];
        $nota = $_POST['nota'];

        $query = "UPDATE notas SET tituloNota='$titulo', nota='$nota' WHERE notaID='$id'";
        $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

        if($rsQuery == true){
            header('Location: ../inicio.php');
            exit();
            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['idNota']);
            unset($_POST['tituloNota']);
            unset($_POST['nota']);
            unset($id);
            unset($titulo);
            unset($nota);
        }
        if($rsQuery == false){
            session_destroy();
            header('Location: ../inicio.php');
            exit();
            echo 'error', '<br />';
        }
?>