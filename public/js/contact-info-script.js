
 var identifier = 0;	
$(document).ready(function() {
		$('#printContactInfo').click(function() {
			identifier++;
			$('.frmb').append(
        "<div class='contactInfo-container-"+identifier+"'>"+
            "<div class='container-buttons' align='right'>"+
                "<h6>Contact Information</h6>"+
                "<button class='btn btn-danger' style='color:white;' onclick='closeComponentContactInfo("+identifier+")' align='center'><i class='fa fa-window-close'></i></button>"+
                "<input type='text' class='form-control' placeholder='Nombre' /><br>"+
                "<input type='text' class='form-control' placeholder='Apellido' /><br>"+
                "<input type='text' class='form-control' placeholder='E-mail' /><br>"+
                "<input type='text' class='form-control' placeholder='Empresa' /><br>"+
                "<input type='text' class='form-control' placeholder='Teléfono' /><br>"+
                "<input type='text' class='form-control' placeholder='Dirección' /><br>"+
                "<input type='text' class='form-control' placeholder='Ciudad' /><br>"+
                "<input type='text' class='form-control' placeholder='País' /><br>"+
                "<input type='text' class='form-control' placeholder='Sexo' /><br>"+
                "<input type='date' class='form-control' placeholder='Fecha de Nacimiento' /><br>"+                
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




   function sendDataContactInfo() {  
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

   function closeComponentContactInfo(indentifierClose) {
   		  $(".frmb").find(".contactInfo-container-"+indentifierClose+"").fadeOut(300, function(){ $(this).remove();});
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


