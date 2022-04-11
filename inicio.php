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

        $titulo = null;
        $nota = null;
        $fecha = null;
        $idUsuario = null;

        if(isset($_POST['btn']) && $_POST['btn'] == 'Guardar'){
                date_default_timezone_set('America/Caracas');
                $titulo = $_POST['tituloNota'];
                $nota = $_POST['nota'];
                $fecha = date('Y-m-d H:i:s');
                $idUsuario = $_SESSION['usuarioID'];

                $QUERY = "INSERT INTO notas (tituloNota, nota, fechaNota, usuarioID) values('$titulo', '$nota', '$fecha', '$idUsuario')";
                $rsQUERY = mysqli_query($con, $QUERY) or die(mysqli_error($con));

                if($rsQUERY == true){

                mysqli_close($con);

                unset($_POST['btn']);
                unset($_POST['titulo']);
                unset($_POST['nota']);
                unset($titulo);
                unset($nota);
                unset($fecha);
                unset($idUsuario);
                header('Location: inicio.php');

            }
            if($rsQUERY == false){
                session_destroy();
                header('Location: index.php');
                exit();
                echo 'error', '<br />';
            }
            }

            if(isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir'){
                $directorio = "Notas/";
                if(!is_dir($directorio)){
                mkdir($directorio, 0777, true);
            }

            $subDirectorio = $directorio."subidas por el usuario/";

            if(!is_dir($subDirectorio)){
                mkdir($subDirectorio, 0777, true);
            }
            opendir($subDirectorio);
            $direccion = $subDirectorio."/".$_FILES["archivo"]["name"];
            if(file_exists($direccion)){
                echo "el archivo ya existe";
            }else{
                copy($_FILES["archivo"]["tmp_name"],$direccion);
                date_default_timezone_set('America/Caracas');
                $fecha = date ('Y-m-d H:i:s', filemtime($direccion));
                $nombre = basename($direccion,".txt");
                $contenido = null;
                $abrir = fopen($direccion, 'r');

                while(!feof($abrir)){
                    $contenido .= fgets($abrir);
                }
                fclose($abrir);

                $idUsuario = $_SESSION['usuarioID'];

                $QUERY = "INSERT INTO notas (tituloNota, nota, fechaNota, usuarioID) values('$nombre', '$contenido', '$fecha', '$idUsuario')";
                $rsQUERY = mysqli_query($con, $QUERY) or die(mysqli_error($con));

                if($rsQUERY == true){

                mysqli_close($con);
                header('Location: inicio.php');
                exit();

            }
            if($rsQUERY == false){
                session_destroy();
                header('Location: index.php');
                exit();
                echo 'error', '<br />';
            }
            }
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
    <div>
        <div class="encabezado bg-light">
            <br>
            <h1 class="text-center">Welcome <?php echo $_SESSION['nombreUsuario'];?></h1>
            <br>
            <ul class="nav justify-content-center nav-fill">
                <li class="nav-item">
                    <a class="nav-link link-dark" href="" data-bs-toggle="modal" data-bs-target="#agregarModal">Crear
                        nueva nota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-dark" href="" data-bs-toggle="modal" data-bs-target="#subirModal">Subir
                        nota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-dark" href="../bloc_notas/verCarpetas.php" target='_black'>Ver archivos
                        locales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-dark" href="usuario.php">Opciones de usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-dark" href="procesos/proceLogout.php">Cerrar Sesión</a>
                </li>
            </ul>
            <?php include('modals/agregarNotas.php');?>
            <?php include('modals/subirNota.php');?>
            <br>
        </div>
        <?php
    $query = "Select * from notas WHERE usuarioID='$ID' ORDER BY fechaNota DESC";
    $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
    while($fileQUERY = mysqli_fetch_assoc($rsquery)){
    ?>
        <div class="card notas mx-auto mt-3 col-5 ">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $fileQUERY['fechaNota']; ?></h5>
                <h6><?php echo $fileQUERY['tituloNota']; ?></h6>
                <p><?php echo $fileQUERY['nota']; ?></p>
                <br>
                <button type="button" data-bs-toggle="modal"
                    data-bs-target="#modiModal<?php echo $fileQUERY['notaID']; ?>"
                    class="btn btn-outline-dark m-1">Modificar</button>
                <a href="proceTXT.php?notaID=<?php echo $fileQUERY['notaID']; ?>" target="_blank"
                    class="btn btn-outline-dark m-1">Guardar en local</a>
                <button type="button" data-bs-toggle="modal"
                    data-bs-target="#borrarModal<?php echo $fileQUERY['notaID']; ?>"
                    class="btn btn-outline-dark m-1">Borrar</a>
            </div>
        </div>
        <br>
        <?php
    include('modals/modificarNotas.php');
    include('modals/borrarNotas.php');
    }
    ?>
        <?php
    mysqli_close($con);
    ?>
        <br />
        <div class="piepagina bg-dark">
            © 2022. Todos los derechos reservados. <br />Maracaibo Venezuela
        </div>
</body>

</html>