/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

var tableCatalogo = $(".tablaCatalogoProductos").DataTable({
   "ajax":"ajax/catalogoProductos.ajax.php?Productos=",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
    "iDisplayLength": 10,
    "fixedHeader": true,
    "order": [[ 0, "asc" ]],
    /*"scrollX": true,*/
     "lengthMenu": [[10, 25, 50, 100, 150,200, 300, -1], [10, 25, 50, 100, 150,200, 300, "All"]],
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

});
/*=============================================
CARGAR LA TABLA DINÁMICA DE MARCAS
=============================================*/
var tablaMarcas = $(".tablaMarcas").DataTable({
    "ajax":"ajax/catalogoProductos.ajax.php?Marca=",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [
        [0, "asc"]
    ],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

/*=============================================
CARGAR LA TABLA DINÁMICA DE SUBCATEGORIAS
=============================================*/
var tablaSubcategorias = $(".tablaSubcategorias").DataTable({
    "ajax":"ajax/catalogoProductos.ajax.php?Subcategoria=",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [
        [0, "asc"]
    ],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

/*=============================================
CARGAR LA TABLA DINÁMICA DE SUBCATEGORIAS DESGLOSE
=============================================*/
var tablaSubcategoriasDesglose = $(".tablaSubcategoriasDesglose").DataTable({
    "ajax":"ajax/catalogoProductos.ajax.php?Desglose=",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [
        [0, "asc"]
    ],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

/*=============================================
CARGAR LA TABLA DINÁMICA DE SUBCATEGORIAS DESGLOSE
=============================================*/
var tablaSubDesglose = $(".tablaSubDesglose").DataTable({
    "ajax":"ajax/catalogoProductos.ajax.php?Subdesglose=",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [
        [0, "asc"]
    ],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/
$(".nuevaFoto").change(function() {
    var imagen = this.files[0];
    /*=============================================
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
      =============================================*/
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaFoto").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (imagen["size"] > 2000000) {
        $(".nuevaFoto").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function(event) {
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    }
})
/*=============================================
EDITAR PRODUCTO
=============================================*/
$(".tablaCatalogoProductos").on("click", ".btnEditarProducto", function() {
    var idProducto = $(this).attr("idProducto");
    var datos = new FormData();
    datos.append("idProducto", idProducto);
    $.ajax({
        url: "ajax/catProductos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarPrecioCubeta").val(respuesta["cubeta"]);
            $("#editarPrecioGalon").val(respuesta["galon"]);
            $("#editarPrecioLitro").val(respuesta["litro"]);
            $("#editarPrecioMedio").val(respuesta["medio"]);
            $("#editarPrecioCuarto").val(respuesta["cuart"]);
            $("#editarPrecioOctavo").val(respuesta["octav"]);
            $("#editarUnidadMedida").val(respuesta["unidadMedida"]);
            $("#editarValorMedida").val(respuesta["valorMedida"]);
            $("#editarGramaje").val(respuesta["gramaje"]);
            $("#editarNombreUnidad").val(respuesta["nombre"]);
            $("#editarCatalogoDesglose").val(respuesta["idSubcategoriaDesglose"]);
            $("#idProducto").val(respuesta["id"]);
        }
    })
})

/*=============================================
EDITAR MARCAS
=============================================*/
$(".tablaMarcas").on("click", ".btnEditarMarca", function() {

    var idMarcas = $(this).attr("idMarcas");
    var datos = new FormData();

    datos.append("idMarcas", idMarcas);
    $.ajax({
        url: "ajax/catProductos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarNombre").val(respuesta["nombre"]);
            $("#idMarcas").val(respuesta["idMarca"]);
            $("#fotoActual").val(respuesta["rutaFoto"]);

            if (respuesta["rutaFoto"] != "") {
                $(".previsualizar").attr("src", respuesta["rutaFoto"]);
            }

        }
    })
})

/*=============================================
EDITAR SUBCATEGORIAS
=============================================*/
$(".tablaSubcategorias").on("click", ".btnEditarSubcategoria", function() {

    var idSubMarca = $(this).attr("idSubMarca");
    var datos = new FormData();

    datos.append("idSubMarca", idSubMarca);
    $.ajax({
        url: "ajax/catProductos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarSubcategoria").val(respuesta["nombreSubcategoria"]);
            $("#idSubMarca").val(respuesta["idSubcategoria"]);
            $("#editarMarcaSub").val(respuesta["idMarca"]);
            $("#fotoActual").val(respuesta["rutaFotoSubcategoria"]);

            if (respuesta["rutaFoto"] != "") {
                $(".previsualizar").attr("src", respuesta["rutaFoto"]);
            }

        }
    })
})

/*=============================================
EDITAR SUBCATEGORIAS DESGLOSE
=============================================*/
$(".tablaSubcategoriasDesglose").on("click", ".btnEditarSubcategoriaDesglose", function() {

    var idDesglose = $(this).attr("idDesglose");
    var datos = new FormData();

    datos.append("idDesglose", idDesglose);
    $.ajax({
        url: "ajax/catProductos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idDesglose").val(respuesta["id"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarSubcategoriaD").val(respuesta["idSubcategoria"]);
            }
    })
})

/*=============================================
EDITAR SUBCATEGORIAS SUBDESGLOSE
=============================================*/
$(".tablaSubDesglose").on("click", ".btnEditarSubdesglose", function() {

    var idSub = $(this).attr("idSub");
    var datos = new FormData();

    datos.append("idSub", idSub);
    $.ajax({
        url: "ajax/catProductos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#idSub").val(respuesta["id"]);
            $("#editarDescripcionSub").val(respuesta["descripcion"]);
            $("#editarSubDesglose").val(respuesta["idDesglose"]);
            $("#editarMarca").val(respuesta["marca"]);
            }
    })
});

/*=============================================
ELIMINAR PRODUCTO
=============================================*/
$(".tablaCatalogoProductos").on("click", ".btnEliminarProducto", function(){

  var idProducto = $(this).attr("idProducto");

  swal({
    title: '¿Está seguro de borrar el Producto?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Producto!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=catalogoProductos&idProducto="+idProducto;

    }

  })

})

/*=============================================
ELIMINAR MARCAS
=============================================*/
$(".tablaMarcas").on("click", ".btnEliminarMarca", function(){

  var idMarca = $(this).attr("idMarca");

  swal({
    title: '¿Está seguro de borrar la Marca?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=subcategoriasProducto&idMarca="+idMarca;

    }

  })

})

/*=============================================
ELIMINAR SUBCATEGORIAS
=============================================*/
$(".tablaSubcategorias").on("click", ".btnEliminarSubcategoria", function(){

  var idSubMarca = $(this).attr("idSubMarca");

  swal({
    title: '¿Está seguro de borrar la Subcategoria?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=subcategoriasProducto&idSubMarca="+idSubMarca;

    }

  })

})

/*=============================================
ELIMINAR SUBCATEGORIAS DESGLOSE
=============================================*/
$(".tablaSubcategoriasDesglose").on("click", ".btnEliminarSubcategoriaDesglose", function(){

  var idDesglose = $(this).attr("idDesglose");

  swal({
    title: '¿Está seguro de borrar los Datos?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=subcategoriasProducto&idDesglose="+idDesglose;

    }

  })

})

/*=============================================
ELIMINAR SUBCATEGORIAS SUBDESGLOSE
=============================================*/
$(".tablaSubDesglose").on("click", ".btnEliminarSubdesglose", function(){

  var idSub = $(this).attr("idSub");

  swal({
    title: '¿Está seguro de borrar los Datos?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=subcategoriasProducto&idSub="+idSub;

    }

  })

})