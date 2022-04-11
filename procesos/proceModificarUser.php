<?php
        include_once('../conexion/conexion.php');
        session_start();
        $ID = NULL;
        $user = NULL;
        $pwd = NULL;

        if(isset($_POST['btn']) && $_POST['btn'] == 'Modificar'){
        if(isset($_POST['usuario']) && isset($_POST['contra']) && !empty($_POST['usuario']) && !
        empty($_POST['contra'])){
                $ID = $_POST['usuarioID'];
                $user = $_POST['usuario'];
                $query = "Select * from usuario Where usuarioID='$ID'";

                $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
                $filequery = mysqli_fetch_array($rsquery);
                if($filequery['password'] === md5($_POST['contra'])){
                    $password = $filequery['password'];
                }else{
                    $password = md5($_POST['contra']);
                }

                $QUERYmod = "UPDATE usuario SET nombreUsuario='$user', password='$password'";
                $QUERYmod .= "WHERE usuarioID='$ID'";
                $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
                if($rsQUERYmod == true){
                    header('Location: ../index.php');
                    exit();
                }
                if($rsQUERYmod == false){
                    echo 'Error no se pudo Actualizar el usuario';
                }
                mysqli_close($con);

                unset($_POST['btn']);
                unset($_POST['usuario']);
                unset($_POST['contra']);
                unset($user);
                unset($pwd);
            }
        }
?>