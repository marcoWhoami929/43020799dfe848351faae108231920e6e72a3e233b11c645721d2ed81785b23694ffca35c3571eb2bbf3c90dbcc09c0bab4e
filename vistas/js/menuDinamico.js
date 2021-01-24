$(document).ready(function(){

	var idUsuario = localStorage.getItem("idUsuario");
	var datos = new FormData();

	datos.append("idUsuario",idUsuario);

	$.ajax({
		url: "ajax/functionsMenu.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta) {

			var arreglo  = respuesta;
			var contenedor = document.getElementById("colorNav");
			var ul = document.createElement("ul");

			var colores = ['#058DC7', 
			'#50B432', 
			'#ED561B', 
			'#DDDF00', 
			'#24CBE5', 
			'#64E572', 
			'#FF9655', 
			'#FFF263', 
			'#6AF9C4',
			'#AFEEEE',
			'#FF9966',
			'#3399FF',
			'#33CC66',
			'#6666CC',
			'#CC6633',
			'#993333',
			'#006600',
			'#CC0033',
			'#A52A2A',
			'#5F9EA0',
			'#D2691E',
			'#FF7F50',
			'#DC143C',
			'#008B8B',
			'#B8860B',
			'#8FBC8F',
			'#20B2AA',
			'#48D1CC',
			'#808000',
			'#807020',
			'#9ACD32'];

			for (var i = 0; i < respuesta.length; i++) {

				var punteroActual = i;
				

				if (punteroActual == 0) {
					var punteroAnterior = i;
				}else{
					var punteroAnterior = i-1;
				}

				var idMenu = respuesta[i]["id"];

				tituloMenu = respuesta[i]["nameM"];
				rutaMenu = respuesta[i]["rutaMenu"];
				nivelMenu = respuesta[i]["nivel"];
				icono = respuesta[i]["icono"];

				rutaSub = respuesta[i]["rutaSub"];
				nameSub = respuesta[i]["nameSub"];

				if (nivelMenu == 1) {
					
					var li = document.createElement("li");
    				var totalColores = colores.length;
	        		
	        		if (i == totalColores) {
	        			var color = (i+1)-totalColores;
	        		}else{
	        			var color = i;
	        		}

    				li.setAttribute("style","background:"+colores[color]+";color:white;width: 24%;height: 200px;");
    			
	    			var a = document.createElement("a");
	    			a.setAttribute("href",rutaMenu);

	    			var ispan = document.createElement("i");
	    			ispan.setAttribute("class",""+icono+" fa-3x");

	    			var nombreSection = document.createElement("h2");
	    			var textoLabel = document.createTextNode(tituloMenu);
	    			nombreSection.appendChild(textoLabel);

	    			ul.appendChild(li);
	    			li.appendChild(a);
	    			li.appendChild(nombreSection);
	    			a.appendChild(ispan);
    		
    			}else if (nivelMenu == 2) {
    			
    				if (respuesta[punteroActual]["nameM"] == respuesta[punteroAnterior]["nameM"] ) {

    				}else{
    			
    				
    					var li = document.createElement("li");
	        	
	        			var totalColores = colores.length;
	        			if (i == totalColores) {
	        				var color = (i+1)-totalColores;
	        			}else{
	        				var color = i;
	        			}
	        			li.setAttribute("style","background:"+colores[color]+";color:white;width: 24%;height: 200px;");
	        			const result = arreglo.filter(identificador => identificador.id == respuesta[punteroActual]["id"]);

	        			var a = document.createElement("a");
	        			a.setAttribute("href","#");


	        			var ispan = document.createElement("i");
	        			ispan.setAttribute("class",""+icono+" fa-3x");


	        			var nombreSection = document.createElement("h2");
				    	var textoLabel2 = document.createTextNode(tituloMenu);
				    	nombreSection.appendChild(textoLabel2);

	        			ul.appendChild(li);
	        			li.appendChild(a);
	        			li.appendChild(nombreSection);
	        			a.appendChild(ispan);
	        			var ulSub = document.createElement("ul");
	        			
	        			for (var j = 0; j < result.length; j++) {

		        			var liSub = document.createElement("li");
		        			var aSub = document.createElement("a");
		        			aSub.setAttribute("href",result[j]["rutaSub"]);

		        			var nameViSub = document.createElement("label");
		        			var textoLabel = document.createTextNode(result[j]["nameSub"]);
		        			nameViSub.appendChild(textoLabel);

		        			li.appendChild(ulSub);
		        			ulSub.appendChild(liSub);
		        			liSub.appendChild(aSub);
		        			aSub.appendChild(nameViSub);
	        						
	        			}
	        		}
	        	}
	        			
	        	contenedor.appendChild(ul);
	        			
	        }
	    }
	        	
	})
});