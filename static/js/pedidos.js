var tabla;

$(document).ready(function(){
    
    tabla = $("#tabla").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        }
    });

    pedidos();
});


function pedidos(){
    
    $.ajax({
        type: "GET",
        url: base_url +"pedido/consultaPedidos",
        dataType: "json",
        success : function(response){
            
            //alert(JSON.stringify(response.pedido[0].fecha));

            var datos = response.pedido
            
            tabla.clear().draw();

            $.each(datos, function (i, elemento) {
                tabla.row.add([
                    elemento.id_pedido,
                    elemento.nombre,
                    elemento.direccion,
                    elemento.total,
                    elemento.fecha,
                    '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#ver" onclick="ver('+elemento.id_pedido+')"> Ver </button> '
                ]).draw().node();
            });
            
        }
    });

}
function ver(id_pedido) {
    $.ajax({
        "url": base_url + "pedido/verPedido",
        "datatype": 'json',
        "type": 'post',
        "data": {'id_pedido': id_pedido},
        "success": function (obj) {
			$('#id_pedido').val(obj.id_pedido);
            $('#nombre').val(obj.nombre);
			$('#marca').val(obj.marca);
            $('#peso').val(obj.peso);
            $('#lote').val(obj.lote);
            $('#codigo_barras').val(obj.codigo_barras);
			$('#caducidad').val(obj.caducidad);
			$('#precio').val(obj.precio);
		}
	});
}