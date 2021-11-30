<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url(); ?>/static/js/bootstrapJS/bootstrap.js"></script>
    <script src="<?= base_url(); ?>/static/js/bootstrapJS/jquery.min.js"></script>
    <link href="<?= base_url(); ?>/static/css/bootstrapCSS/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>static/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>static/css/estilos/plataforma.css" rel="stylesheet">
    <script src="<?= base_url() ?>static/js/datatables.min.js"></script>
    <script src="<?= base_url() ?>static/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>static/css/datatables_bootstrap4.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="ml-auto menu-derecha">
        </div>
    </nav>

    <main role="main" class="wrapper">
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <li class="">
                    <a href="<?= base_url() ?>inicio/principal"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                </li>
                <li class="">
                    <a href="<?= base_url() ?>usuario/pedidos"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Pedidos </a>
                </li>
                <li class="">
                    <a href="<?= base_url() ?>usuario/cerrarSesion"><i class="fa fa-close" aria-hidden="true"></i> Cerrar sesion</a>
                </li>
            </ul>
        </nav>

        <div id="content" class="p-5">
            <div class="row mb-2">
                <h1>Últimos pedidos</h1>
            </div>
            <div class="row">
            </div>

            

            <table id="tabla" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </main>


    <script>
        var base_url = "<?= base_url() ?>"
    </script>
    
    <script src="<?= base_url() ?>static/js/pedidos.js"></script>
</body>

</html>