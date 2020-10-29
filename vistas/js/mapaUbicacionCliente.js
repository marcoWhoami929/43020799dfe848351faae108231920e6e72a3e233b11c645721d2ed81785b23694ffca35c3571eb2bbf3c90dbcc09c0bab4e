function localizar(elemento,direccion) {
		var geocoder = new google.maps.Geocoder();

		var map = new google.maps.Map(document.getElementById(elemento), {
		  zoom: 16,
		  scrollwheel: true,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		
		geocoder.geocode({'address': direccion}, function(results, status) {
			if (status === 'OK') {
				var resultados = results[0].geometry.location,
					resultados_lat = resultados.lat(),
					resultados_long = resultados.lng();

				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
			} else {
				var mensajeError = "";
				if (status === "ZERO_RESULTS") {
					mensajeError = "No hubo resultados para la dirección ingresada.";
				} else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
					mensajeError = "Error general del mapa.";
				} else if (status === "INVALID_REQUEST") {
					mensajeError = "Error de la web. Contacte con Name Agency.";
				}
				alert(mensajeError);
			}
		});
	}
	
    $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyA_dlGznsov-uJDQUmmsHIR_vsA103iiLc", function() {
		$("#mostrarMapa").click(function() {
            var direccion = $("#direccion").val();
			if (direccion !== "") {
				localizar("mapa-geocoder", direccion);
  			$('#verMapa').toggle(1000);

			}
        });
        $("#close").click(function(){
  		$("#verMapa").toggle(1000);
		});

		$("#salir").click(function(){
  			$("#verMapa").toggle(1000);

		});
	});