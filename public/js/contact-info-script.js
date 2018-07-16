
 var identifier = 0;	
$(document).ready(function() {
		$('#printContactInfo').click(function() {
			identifier++;
			$('.frmb').append(
				// "<div class='matrix-container-"+identifier+"'>"+
				// 		"<div class='container-buttons' align='right'>"+
    //             "<h6>Matrix</h6>"+
				// 		    "<button class='btn' style='color:white;' id='button-addRow-"+identifier+"' onclick='addRow("+identifier+")'>Agregar fila</button>"+
				// 		    "<button class='btn' style='color:white;' id='button-addColumn-"+identifier+"'  onclick='addColumn("+identifier+")'>Agregar columna</button>"+
				// 		    "<button class='btn' style='color:white;' id='button-generateMatrix-"+identifier+"' onclick='generateMatrix("+identifier+")'>Generar Matrix </button>"+
				// 		    "<button class='btn' style='color:white;' id='button-reverse-"+identifier+"' onclick='reverse("+identifier+")'>Editar</button>"+
				// 		    "<button class='btn btn-danger' style='color:white;' onclick='closeComponent("+identifier+")' align='center'><i class='fa fa-window-close'></i></button>"+
				// 		"</div>"+
				// 		"<div class='matrix-content-"+identifier+"'></div>"
				// +"</div>"

        "<div class='contactInfo-container-"+identifier+"'>"+
            "<div class='container-buttons' align='right'>"+
                "<h6>Contact Information</h6>"+
                "<button class='btn btn-danger' style='color:white;' onclick='closeComponent("+identifier+")' align='center'><i class='fa fa-window-close'></i></button>"+
                "<input type='text' class='form-control' placeholder='Nombre' />"+
                "<input type='text' class='form-control' placeholder='Apellido' />"+
                "<input type='text' class='form-control' placeholder='E-mail' />"+
                "<input type='text' class='form-control' placeholder='Empresa' />"+
                "<input type='text' class='form-control' placeholder='Teléfono' />"+
                "<input type='text' class='form-control' placeholder='Dirección' />"+
                "<input type='text' class='form-control' placeholder='Ciudad' />"+
                "<input type='text' class='form-control' placeholder='País' />"+
                "<input type='text' class='form-control' placeholder='Sexo' />"+
                "<input type='date' class='form-control' placeholder='Fecha de Nacimiento' />"+                
            "</div>"+
            "<div class='contactInfo-content-"+identifier+"'></div>"
        +"</div>"
		    );
			$("#button-reverse-"+identifier+"").hide();
		});
});

  function addRow(identifier) {
  	let inputIdentifier = Math.floor(Math.random() * 10000000 + 1);
 	 		    $(".matrix-content-"+identifier+"").append(
 	 		     "<div class='input-component-"+inputIdentifier+"'>"+	
	 	 		      "<br>"+	
	 	 		      "<label>Nombre de renglón</label>"+  
					   "<br>"+
					   "<input class='row form-control' type='text'>"+
					   "<button onclick='addRow("+identifier+")'><i class='fa fa-plus-square'></i></button>"+
					   "<button onclick='removeInput("+inputIdentifier+")'><i class='fa fa-window-close'></i></button>"+
				 "<div>"	   
 	 		    );
   }
   function addColumn(identifier) {
   	  let inputIdentifier = Math.floor(Math.random() * 10000000 + 1);
   				 $(".matrix-content-"+identifier+"").append(
   				   "<div class='input-component-"+inputIdentifier+"'>"+	
   				 	   "<br>"+
   				 		"<label>Nombre de columna</label>"+		
				        "<br>"+
				  		"<input class='column form-control' type='text'>"+
				  		"<button onclick='addColumn("+identifier+")'><i class='fa fa-plus-square'></i></button>"+
				  		"<button onclick='removeInput("+inputIdentifier+")'><i class='fa fa-window-close'></i></button>"+
				   "<div>"		
   				 );
   }


   function generateMatrix(identifier) {
   	  	let columns = [];
   		let rows = [];

   		$("#button-addRow-"+identifier+"").hide(400);
   		$("#button-addColumn-"+identifier+"").hide(400);
   		$("#button-generateMatrix-"+identifier+"").hide(400);
   		$("#button-reverse-"+identifier+"").show(400);

   		 $(".matrix-content-"+identifier+" > div > input").each(function(index, element) {
   		 		 if($(this).attr('class') == 'row form-control') {
   		 		 	 rows.push($(this).val());
   		 		 } else {	
   		 		 	 columns.push($(this).val());
   		 		 }	
   		 });
   		 createMatrixTable(columns, rows, identifier);
   }

   function createMatrixTable(columns, rows, identifier) {
	  var t = "<table class='table matrix-table' id='matrix-table'  >";
	    t += "<thead>";
	    t += "<tr>";
	    for(let x =0; x < columns.length + 1; x++) {   //columns.length
	      if(x == 0) {
	         t += "<th></th>";
	      } else {
	          t += "<th class='attrColumn'>"
	         t +=  columns[x-1];
	         t += "</th>";    
	      }
	    }
	    t += "</tr>";
	    t += "</thead>";
	    t += "<tbody>";
	    for(let y =0; y < rows.length; y++) {  // rows.length'
	        let radioGroup = Math.floor(Math.random() * 10000000 + 1);
	        t += "<tr>";
	          t += "<td class='attrRow'>";
	          t +=  rows[y];
	          t += "</td>";
	        for(let d=0; d < columns.length; d++) {
	            t += "<td>";
	            //t += "<input name='radio-group-"+y+"'type='radio'>";
	            t += "<input name='radio-group-"+radioGroup+"'type='radio'>";
	            t += "</td>";
	        }  
	        t += "</tr>";
	    }

	    t += "</tbody>";
	  t += "</table>";

	  $(".matrix-content-"+identifier+"").html(t);

   }

   function compactInformation(identifier) {
	 	let tableContent = [];
      	let columns = [];
     	let rows = [];
   	    let table = $(".matrix-content-"+identifier+"").find('table'); 
   	       $(table).each(function (a, b) {
   	       	let columnText = b.getElementsByClassName('attrColumn');
   	       	let rowText = b.getElementsByClassName('attrRow');

   	       	for(let element in columnText) {
   	       		if(columnText[element].innerText != undefined)
   	       		     columns.push(columnText[element].innerText);
   	       	}
   	       	for(let element in rowText) {
   	       		 if(rowText[element].innerText != undefined)
   	       		     rows.push(rowText[element].innerText);
   	       	}
                tableContent.push({ Columns: columns, Rows: rows });
            });
   	       return tableContent;
   }



   function reverse(identifier) {
   			$("#button-addRow-"+identifier+"").show(400);
   		    $("#button-addColumn-"+identifier+"").show(400);
   		    $("#button-generateMatrix-"+identifier+"").show(400);
   		    $("#button-reverse-"+identifier+"").hide(400);

   			contentInputs = compactInformation(identifier);
   	      	table = $(".matrix-content-"+identifier+"").find('table'); 
   	      	$(table).remove();
   	      	contentInputs[0].Columns.forEach(function(element) {
   	      		 let inputIdentifier = Math.floor(Math.random() * 10000000 + 1);
	   	      		$(".matrix-content-"+identifier+"").append(
	   	      			  /*"<br>"+
		   	      	       "<label>Nombre de la columna</label>"+  
						   "<br>"+
						   "<input class='column' type='text' value='"+element+"''>" */
						   	"<div class='input-component-"+inputIdentifier+"'>"+	
		   				 	   "<br>"+
		   				 		"<label>Nombre de columna</label>"+		
						        "<br>"+
						  		"<input class='column form-control' type='text' value='"+element+"''>"+
						  		"<button onclick='addColumn("+identifier+")'><i class='fa fa-plus-square'></i></button>"+
						  		"<button onclick='removeInput("+inputIdentifier+")'><i class='fa fa-window-close'></i></button>"+
						   "<div>"	
					);
   	      	});
   	      	contentInputs[0].Rows.forEach(function(element) {
   	      		let inputIdentifier = Math.floor(Math.random() * 10000000 + 1); 
	   	      		$(".matrix-content-"+identifier+"").append(
	   	      			 /* "<br>"+
		   	      	       "<label>Nombre de la fila</label>"+  
						   "<br>"+
						   "<input class='row' type='text' value='"+element+"''>"*/
						    "<div class='input-component-"+inputIdentifier+"'>"+	
				 	 		      "<br>"+	
				 	 		      "<label>Nombre de renglón</label>"+  
								   "<br>"+
								   "<input class='row form-control' type='text' value='"+element+"''>"+
								   "<button onclick='addRow("+identifier+")'><i class='fa fa-plus-square'></i></button>"+
								   "<button onclick='removeInput("+inputIdentifier+")'><i class='fa fa-window-close'></i></button>"+
							 "<div>"	   
					);
   	      	});		
   }

   function sendData() {  // seguir tomorrow recorrer las tablas con clase y meterlas a compactinfo para guardarlas en db 
      matrixArray = [];
   		$('.frmb').each(function() {
   			let tableContent = [];
   			let table  =  $(this).find(".matrix-table");
   		$(table).each(function (a, b) {
   			let columns = [];
     	      let rows = [];
   	       	let columnText = b.getElementsByClassName('attrColumn');
   	       	let rowText = b.getElementsByClassName('attrRow');
   	       	for(let element in columnText) {
   	       		if(columnText[element].innerText != undefined)
   	       		     columns.push(columnText[element].innerText);
   	       	}
   	       	for(let element in rowText) {
   	       		 if(rowText[element].innerText != undefined)
   	       		     rows.push(rowText[element].innerText);
   	       	}
                tableContent.push({ Columns: columns, Rows: rows });
                //matrixArray.push(tableContent);
                matrixArray = tableContent;
        });
   			
   		});
         return matrixArray;
   }

   function closeComponent(indentifierClose) {
   		  $(".frmb").find(".matrix-container-"+indentifierClose+"").fadeOut(300, function(){ $(this).remove();});
   }

   function removeInput(identifierInput) {
   	    $(".input-component-"+identifierInput+"").fadeOut(300, function(){ $(this).remove();});
   }


   function isEmpty(obj) {
       // null and undefined are "empty"
       if (obj == null) return true;
       // Assume if it has a length property with a non-zero value
       // that that property is correct.
       if (obj.length > 0)    return false;
       if (obj.length === 0)  return true;
       // If it isn't an object at this point
       // it is empty, but it can't be anything *but* empty
       // Is it empty?  Depends on your application.
       if (typeof obj !== "object") return true;
       // Otherwise, does it have any properties of its own?
       // Note that this doesn't handle
       // toString and valueOf enumeration bugs in IE < 9
       for (var key in obj) {
           if (hasOwnProperty.call(obj, key)) return false;
       }
       return true;
    }


