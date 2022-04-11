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
    <div class="encabezado bg-light">
        <h1>Bloc de notas<img src="img/notas.png" alt=""></h1>
    </div>

    <div class="mx-auto my-5 p-5" style="width: 300px;">
        <form name="form1" action="procesos/proceLogin.php" method="post">
            <h2>Iniciar sesión</h2>
            <label>Usuario:</label><br />
            <input type="text" name="usuario" required><br />
            <label>Password:</label><br />
            <input type="password" name="contra" required><br />
            <br />
            <div id="liveAlertPlaceholder"></div>
            <input type="submit" value="Entrar" name="btn" id="liveAlertBtn" class="btn btn-light m-1">
            <a href="registrarUsuario.php" class="btn btn-light m-1">Registrar</a>
    </div>
    <div>
        <div class="piepagina fixed-bottom bg-dark">
            © 2022. Todos los derechos reservados. <br />Maracaibo Venezuela
        </div>
    </div>
</body>

</html>