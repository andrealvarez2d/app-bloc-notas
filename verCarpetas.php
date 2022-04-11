<?php
    $direct = "Notas/";
    if(!is_dir($direct)){
        mkdir($direct, 0777, true);
        echo "Cree una nota";
    }

    $listar = null;
    $ruta = "../bloc_notas/Notas";
    $directorio = opendir($ruta);
    while($elemento = readdir($directorio)){
        if($elemento != '.' && $elemento != '..'){
            $listar .="<ul><img src='img/carpeta.png'><a href='../bloc_notas/verCarpetas2.php?dir=../bloc_notas/Notas/$elemento' class='nav-link link-dark'>$elemento/</a></ul>";
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
            <?php echo $listar;?>
        </div>
    </div>
    <div class="piepagina fixed-bottom bg-dark">
        © 2022. Todos los derechos reservados. <br />Maracaibo Venezuela
    </div>
</body>

</html>