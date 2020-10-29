
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
/**
 * Validacion y llenado de campos de busqueda de cliente
 */
$(function() {
    $("#otCodigoCliente").autocomplete({
        source: "ajax/searchCliente.ajax.php",
        minLength: 2,
        select: function(event, ui) {
        event.preventDefault();
        $('#otCodigoCliente').val(ui.item.codigoCliente);
        $('#otRfcCliente').val(ui.item.rfc);
        $('#otNombreCliente').val(ui.item.nombreCliente);
        $('#otVendedor').val(ui.item.agenteVentas);
        $('#otDiasCredito').val(ui.item.diasCredito);
        $('#otEstatusCliente').val(ui.item.statusCliente);

        $("#otCodigoCliente").focus();
         }
          });
});