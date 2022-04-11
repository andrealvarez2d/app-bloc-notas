<?php
    $text = $_GET['texto'];
    $dir = $_GET['dir'];
    $name = $_GET['nombre'];
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
    <title><?php echo $name; ?></title>
</head>

<body>
    <div class="encabezado bg-light">
        <br>
        <h1 class="text-center">Nota</h1>
    </div>
    <br>
    <div class="card notas mx-auto mt-3 col-5 ">
        <div class="card-header">
        </div>
        <div class="card-body">
            <h5>Ruta de guardado: <?php echo $dir; ?></h5>
            <h6>Contenido:</h6>
            <p><?php echo $text; ?></p>
            <br>
            <a href="../bloc_notas/verCarpetas.php" class="btn btn-outline-dark m-1">Regresar</a>
        </div>
        <div>
            <div class="piepagina fixed-bottom bg-dark">
                © 2022. Todos los derechos reservados. <br />Maracaibo Venezuela
            </div>
</body>

</html>