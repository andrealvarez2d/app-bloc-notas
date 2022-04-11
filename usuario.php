<?php
    include_once('conexion/conexion.php');
    session_start();

    if(isset($_SESSION['usuarioID'])){
        $ID = $_SESSION['usuarioID'];
        $query = "Select * from usuario Where usuarioID='$ID'";
        $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
        $countQUERY = mysqli_num_rows($rsquery);
        if($countQUERY<=0){
        header('Location: index.php');
        exit();
        }
        }else{
        header('Location: index.php');
        exit();
        }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/notas.png">
    <title>Bloc de notas</title>
</head>

<body>
    <div class="text-center encabezado bg-light">
        <br>
        <h1>Opciones de usuario</h1>
    </div>
    <div class="mx-auto my-5 p-5" style="width: 800px;">
        <table class="table table-secondary">
            <tr>
                <td>ID</td>
                <td>Usuario</td>
                <td>Opciones</td>
            </tr>
            <?php
    $query = "Select * from usuario Where usuarioID='$ID'";
    $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
    while($fileQUERY = mysqli_fetch_array($rsquery)){
    ?>
            <tr>
                <td><?php echo $fileQUERY['usuarioID']; ?></td>
                <td><?php echo $fileQUERY['nombreUsuario']; ?></td>
                <td>
                    <button type="button" data-bs-toggle="modal"
                        data-bs-target="#modiModal<?php echo $fileQUERY['usuarioID']; ?>"
                        class="btn btn-light m-1">Modificar</button>
                    <button type="button" data-bs-toggle="modal"
                        data-bs-target="#borrarModal<?php echo $fileQUERY['usuarioID']; ?>"
                        class="btn btn-light m-1">Borrar</button>
                </td>
            </tr>
            <?php
    include('modals/modificarUsuario.php');
    include('modals/borrarUsuario.php');
} ?>
        </table>
        <?php
    mysqli_close($con);
    ?>
        <br />
        <a href="inicio.php" title="Regresar" class="btn btn-light">Regresar</a>
    </div>

    <div class="piepagina fixed-bottom bg-dark">
        © 2022. Todos los derechos reservados. <br />Maracaibo Venezuela
    </div>
</body>

</html>