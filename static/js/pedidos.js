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
                    '<button class="btn btn-info"> Ver </button> '
                ]).draw().node();
            });
            
        }
    });

};