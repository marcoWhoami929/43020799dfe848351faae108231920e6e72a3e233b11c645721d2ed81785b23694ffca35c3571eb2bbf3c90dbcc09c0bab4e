var today = new Date();
var dd = today.getDate();
mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = "0" + dd;
}

if (mm < 10) {
  mm = "0" + mm;
}
$(function () {
   $(".modal").on("shown.bs.modal", function () {
    $(this).find("input:first").focus();
  });
  url = window.location.pathname;
  ruta = url.split("/");
  switch (ruta[1]) {
    case "backorder":
      $("#periodo").val(mm.replace("0", ""));
      cargarBackorder(1);
      loadClients(1);
      break;
  }
});
function cargarBackorder(page) {
  var per_page = 500;
  var vista = "cargarBackorder";
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var empresa = $("#empresa").val();
  var canal = $("#canal").val();
  var marca = $("#marca").val();
  var fechaIni = $("#fechaInicio").val();
  var fechaFin = $("#fechaFinal").val();
  var clasificacion = $("#clasificacion").val();
  var periodo = $("#periodo").val();
  var estatus = $("#estatus").val();
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var cliente = "";
  } else {
    if (arreglo == "[]") {
      var cliente = "";
    } else {
      var cliente = JSON.stringify(arreglo);
    }
  }
  if (fechaIni != "" && fechaFin != "") {
    var fechaInicio = $("#fechaInicio").val();
    var fechaFinal = $("#fechaFinal").val();
  } else {
    var fechaInicio = "";
    var fechaFinal = "";
  }

  var parametros = {
    action: "productosBackorder",
    page: page,
    per_page: per_page,
    empresa: empresa,
    canal: canal,
    marca: marca,
    fechaInicio: fechaInicio,
    fechaFinal: fechaFinal,
    cliente: cliente,
    clasificacion: clasificacion,
    periodo: periodo,
    estatus: estatus,
    campo: campo,
    orden: orden,
    vista: vista,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/backorder.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Buscando...");
    },
    success: function (data) {
      $(".data").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function busquedaFechas() {
  var fechaInicio = $("#fechaInicio").val();
  var fechaFinal = $("#fechaFinal").val();
  if (fechaInicio != "" && fechaFinal != "") {
    cargarBackorder(1);
  } else {
    swal({
      type: "error",
      title: "¡No se puede realizar la busqueda!",
      showConfirmButton: true,
      confirmButtonText: "Cerrar",
    }).then(function (result) {});
  }
}
function generarReporteNew(vista) {
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var empresa = $("#empresa").val();
  var canal = $("#canal").val();
  var marca = $("#marca").val();
  var fechaIni = $("#fechaInicio").val();
  var fechaFin = $("#fechaFinal").val();
  var page = 1;
  var per_page = 500;
  var clasificacion = $("#clasificacion").val();
  var periodo = $("#periodo").val();
  var estatus = $("#estatus").val();
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var cliente = "";
  } else {
    if (arreglo == "[]") {
      var cliente = "";
    } else {
      var cliente = JSON.stringify(arreglo);
    }
  }

  if (fechaIni != "" && fechaFin != "") {
    var fechaInicio = $("#fechaInicio").val();
    var fechaFinal = $("#fechaFinal").val();
  } else {
    var fechaInicio = "";
    var fechaFinal = "";
  }
  var clientes = cliente.replace("&", "%26");
  location.href =
    "vistas/modulos/reporteador.php?reporteadorNew=" +
    "&empresa=" +
    empresa +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&canal=" +
    canal +
    "&campoOrden=" +
    campo +
    "&orden=" +
    orden +
    "&marca=" +
    marca +
    "&fechaInicio=" +
    fechaInicio +
    "&fechaFinal=" +
    fechaFinal +
    "&clasificacion=" +
    clasificacion +
    "&periodo=" +
    periodo +
    "&estatus=" +
    estatus +
    "&clientes=" +
    clientes +
    "&vista=" +
    vista;
}
function detalleProductos(idDocumento, empresa) {
  var page = 1;
  var per_page = 500;
  var vista = "detalleProductos";
  var parametros = {
    action: "detalleProductosPedido",
    page: page,
    per_page: per_page,
    empresa: empresa,
    idDocumento: idDocumento,
    vista: vista,
  };
  $.ajax({
    url: "ajax/backorder.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {},
    success: function (data) {
      $(".detailProductos").html(data).fadeIn("slow");
    },
  });
}

/****BUSCADOR DE CLIENTE */
function loadClients(page) {
  var cliente = $("#nombreClienteSearch").val();
  var vista = $("#clasificacionVenta").val();
  var vista2 = $("#clasificacionVenta2").val();

  var per_page = "10";
  var parametros = {
    action: "busquedaClientes",
    page: page,
    nombreClienteSearch: cliente,
    vista: vista,
    vista2: vista2,
    per_page: per_page,
  };
  $("#loader2").fadeIn("slow");
  $.ajax({
    url: "ajax/backorder.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader2").html("Cargando...");
    },
    success: function (data) {
      $(".outer_div").html(data).fadeIn("slow");
      $("#loader2").html("");
    },
  });
}
function agregarDatosBusqueda(datoBusqueda, nombreArreglo) {
  var array = localStorage.getItem("" + nombreArreglo + "");

  if (array == undefined || array == "") {
    var nombreArray = [];
    localStorage.setItem("" + nombreArreglo + "", "[]");
    validateItemArray(nombreArray, datoBusqueda, "" + nombreArreglo + "");
  } else {
    var nombreArray = JSON.parse(localStorage.getItem("" + nombreArreglo + ""));
    validateItemArray(nombreArray, datoBusqueda, "" + nombreArreglo + "");
  }
}
function validateItemArray(array, item, nombreArreglo) {
  if (array.indexOf(item) === -1) {
    array.push(item);

    localStorage.setItem("" + nombreArreglo + "", JSON.stringify(array));
    var nombreCampo = "#" + nombreArreglo;
    switch (nombreArreglo) {
      case "arrayClientes":
        $("#arregloClientes").tagEditor("destroy");
        $("#arregloClientes").tagEditor({
          initialTags: JSON.parse(localStorage.getItem("arrayClientes")),
          delimiter: ", ",
          forceLowercase: false,
          beforeTagDelete: function (field, editor, tags, val) {
            var arrayClientes = localStorage.getItem("arrayClientes");
            removeItemFromArregloBusqueda(arrayClientes, val, "arrayClientes");
          },
        });
        break;
      case "arrayProductos":
        $("#arregloProductos").tagEditor("destroy");
        $("#arregloProductos").tagEditor({
          initialTags: JSON.parse(localStorage.getItem("arrayProductos")),
          delimiter: ", ",
          forceLowercase: false,
          beforeTagDelete: function (field, editor, tags, val) {
            var arrayProductos = localStorage.getItem("arrayProductos");
            removeItemFromArregloBusqueda(
              arrayProductos,
              val,
              "arrayProductos"
            );
          },
        });
        break;
      case "arrayProductosCostos":
        $("#arregloProductosCostos").tagEditor("destroy");
        $("#arregloProductosCostos").tagEditor({
          initialTags: JSON.parse(localStorage.getItem("arrayProductosCostos")),
          delimiter: ", ",
          forceLowercase: false,
          beforeTagDelete: function (field, editor, tags, val) {
            var arrayProductosCostos = localStorage.getItem(
              "arrayProductosCostos"
            );
            removeItemFromArregloBusqueda(
              arrayProductosCostos,
              val,
              "arrayProductosCostos"
            );
          },
        });
        break;
    }

    switch (ruta[1]) {
      case "backorder":
        cargarBackorder(1);
        break;
    }
  } else if (array.indexOf(item) > -1) {
    localStorage.setItem("" + nombreArreglo + "", JSON.stringify(array));
  }
}
function removeItemFromArregloBusqueda(array, item, nombreArreglo) {
  var arreglo = JSON.parse(array);

  for (var i in arreglo) {
    if (arreglo[i] == item) {
      arreglo.splice(i, 1);
      localStorage.setItem("" + nombreArreglo + "", JSON.stringify(arreglo));

      break;
    }
  }
  switch (ruta[1]) {
    case "backorder":
      cargarBackorder(1);
      break;
  }
}
function agregarBackorder(
  serie,
  folio,
  codigoProducto,
  unidades,
  empresa,
  idDocumento,
  el
) {
  var row = $(el).parents("tr");
  var unidadesPendientes = row.find(".unidadesPendientes").val();
  var pendientes = unidadesPendientes;

  var parametros = {
    action: "agregarBackorder",
    serie: serie,
    folio: folio,
    codigoProducto: codigoProducto,
    unidades: unidades,
    unidadesPendientes: pendientes,
  };
  $.ajax({
    url: "ajax/backorder.ajax.php",
    data: parametros,
    success: function (data) {
      var response = data.replace(/['"]+/g, "");
      if (response == "ok") {
        detalleProductos(idDocumento, empresa);
      }
    },
  });
}
function agregarSurtido(
  serie,
  folio,
  codigoProducto,
  unidades,
  empresa,
  idDocumento,
  el,
  backorder
) {
  var row = $(el).parents("tr");
  var unidadesPendientes = row.find(".unidadesPendientes").val();
  var pendientes = unidadesPendientes;
  var parametros = {
    action: "agregarSurtido",
    serie: serie,
    folio: folio,
    codigoProducto: codigoProducto,
    unidades: unidades,
    unidadesPendientes: pendientes,
    backorder: backorder,
  };
  $.ajax({
    url: "ajax/backorder.ajax.php",
    data: parametros,
    success: function (data) {
      var response = data.replace(/['"]+/g, "");
      if (response == "ok") {
        detalleProductos(idDocumento, empresa);
      }
    },
  });
}
function eliminarBackorder(serie,folio,codigoProducto,unidades){

  var parametros = {
    action: "eliminarBackorder",
    serie: serie,
    folio: folio,
    codigoProducto: codigoProducto,
    unidades: unidades,
  
  };
  $.ajax({
    url: "ajax/backorder.ajax.php",
    data: parametros,
    success: function (data) {
      var response = data.replace(/['"]+/g, "");
      if (response == "ok") {
         cargarBackorder(1);
      }
    },
  });

}