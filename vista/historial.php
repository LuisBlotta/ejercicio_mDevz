<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand"  href="../busqueda.php">Busqueda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <a class="nav-link" href="historial.php">Historial</a>

        </ul>
    </div>
</nav>


    <div class="container">
        <h1>Historial de búsqueda</h1>
        <br>
        <table class="table table-striped">
            <thead>
            <tr class="table-primary" style="color: darkblue">
                <th>Palabra</th>
                <th>Fecha hora</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($historial as $historia) {?>
            <tr >
                <td "><?= $historia['busqueda'] ?></td>
                <td><?= $historia['fecha'] ?></td>

            </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>



    <br>



<p></p>
</body>

</html>