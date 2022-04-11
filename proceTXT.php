<?php
    include_once('conexion/conexion.php');
    session_start();
    $id = $_GET["notaID"];
    $QUERYmod = "SELECT * FROM notas WHERE notaID='$id'";
    $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
    $fileQUERY = mysqli_fetch_assoc($rsQUERYmod);

    $direccion = "../bloc_notas/";
    $directorio = $direccion."Notas";

    if(!is_dir($directorio)){
        mkdir($directorio, 0777, true);
    }

    $fecha = $fileQUERY['fechaNota'];
    $fechaCarpeta = substr($fecha, 0, 10);
    $subDirectorio = $directorio."/".$fechaCarpeta;

    if(!is_dir($subDirectorio)){
        mkdir($subDirectorio, 0777, true);
    }

    $msg = null;
    $nombre = $fileQUERY['tituloNota'];
    $contenido = $fileQUERY['nota'];
    $ruta = $subDirectorio."/".$nombre.".txt";

    $manejador = fopen($ruta, 'w');

    fwrite($manejador,$contenido);

    fclose($manejador);

    $texto = null;
    $abrir = fopen($ruta, 'r');

    while(!feof($abrir)){
        $texto .= fgets($abrir);
    }

    fclose($abrir);
    ?>

<!DOCTYPE html>
<html lang="en">

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
    <title><?php echo $nombre; ?></title>
</head>

<body>
    <div class="encabezado bg-light">
        <br>
        <h1 class="text-center">Nota</h1>
    </div>
    <br>
    <?php
    include('mostrarNotaGuardado.php');
    ?>
    <div class="piepagina fixed-bottom bg-dark">
        © 2022. Todos los derechos reservados. <br />Maracaibo Venezuela
    </div>
</body>

</html>