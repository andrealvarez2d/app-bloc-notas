<?php
    $listar2 = null;
    $dir = $_GET['dir'];
    //echo $dir;
    $directorio = opendir($dir);
    while($elemento = readdir($directorio)){
        if($elemento != '.' && $elemento != '..'){
            $ruta = $dir.'/'.$elemento;
            $texto = null;
            $abrir = fopen($ruta, 'r');
            while(!feof($abrir)){
            $texto .= fgets($abrir);
            }
            $nombre = basename($ruta,".txt");
            $listar2 .="<ul><img src='img/archivo.png'><a href='../bloc_notas/mostrarNotaCarpeta.php?texto=$texto&dir=$ruta&nombre=$nombre' class='nav-link link-dark'>$elemento</a></ul>";
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
    <title>Archivos locales</title>
</head>

<body>
    <div class="encabezado bg-light">
        <br>
        <h1 class="text-center">Archivos locales</h1>
    </div>
    <br>
    <div class="card mx-auto mt-3 col-5 ">
        <div class="card-header">
        </div>
        <div class="card-body">
            <?php echo $listar2;?>
            <a href="../bloc_notas/verCarpetas.php" class="btn btn-outline-dark m-1">Regresar</a>
        </div>
    </div>
    <div class="piepagina fixed-bottom bg-dark">
        © 2022. Todos los derechos reservados. <br />Maracaibo Venezuela
    </div>
</body>

</html>