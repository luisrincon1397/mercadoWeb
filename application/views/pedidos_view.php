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
	<div class="modal fade" tabindex="-1" role="dialog" id="ver">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Lista de productos</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<div class="form-row">
                            <div class="col-3 form-group">
                                <label>ID de productos</label>
                                <input class="form-control" type="text" id="id_pedido" disabled>
                            </div>
                        <div class="form-row">
                            <div class="col-3 form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" id="nombre" disabled>
                            </div>
							<div class="col-3 form-group">
                                <label>Marca</label>
                                <input class="form-control" type="text" id="marca" disabled>
                            </div>
							<div class="col-3 form-group">
                                <label>Peso</label>
                                <input class="form-control" type="text" id="peso" disabled>
                            </div>
						</div>
						<div class="modal-body">
							<div class="form-row">
								<div class="col-3 form-group">
									<label>Lote</label>
									<input class="form-control" type="text" id="lote" disabled>
								</div>
								<div class="col-3 form-group">
									<label>Código de barras</label>
									<input class="form-control" type="text" id="codigo_barras" disabled>
								</div>
								<div class="col-3 form-group">
									<label>Caducidad</label>
									<input class="form-control" type="text" id="caducidad" disabled>
								</div>
								<div class="col-3 form-group">
									<label>Precio</label>
									<input class="form-control" type="text" id="precio" disabled>
								</div>
                            </div>
						</div>
                        <div class="modal-footer">
                            <button class="btn btn-danger form-control" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        var base_url = "<?= base_url() ?>"
    </script>
    
    <script src="<?= base_url() ?>static/js/pedidos.js"></script>
</body>

</html>