$(document).ready(function(){
  var openDiv = "<div>";
  var closeDiv = "</div>";
  var br = "<br />";
  var count = 0;
  var id_name = "";
  $(".agregar").on('click', function () {
    event.preventDefault();
    let url = `/get-options/${$(this).data('type')}`;
    console.log(url);
    $.ajax({
      method: 'GET',
      url: url
    }).done(response => {
      id_name = "id='question"+count+"' name='question"+count+"'";
      option = "id='option"+count+"' name='option"+count+"'";
      count+=1;

      // Question Title Replace
      response.html = response.html.replace('id="" name=""', id_name);
      // Question Option Replace
      response.html = response.html.replace('id="option" name="option"', option);
      // Print Values
      $("#template-container").append("<div "+id_name+"'"+">"
                +response.html+closeDiv+br);
      document.getElementById("questions_count").value = count;
      console.log(response);
    })
  });

  $(document).ready( function () {
    $('#table-mis-encuestas').DataTable();
} );



 $("#save-data").on('click', function () {
  var fbEditor = document.getElementById('fb-editor');
    alert(fbEditor.actions.getData('json'));
 });


    $(document).ready( function () {
    $('#table-mi-cuenta').DataTable();
} );

//Dropdown Option Question
$(".myDropdown").on('click', function () {
    document.getElementById("myDropdown").classList.toggle("show");
    if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
});

// //JQuery

//  var inputValue = $("#template-container").html;     
//     $.ajax( {
//         type : "POST",
//         cache : false,
//         async : true,
//         global : false,
//         url : "URL POST DATA",
//         data : {
//             editorcontents : escape(inputValue),
//         }
//     } ).done( function ( data )
//     {   
//         console.log(data)//Handle event send done;
//     } )

  // $('#stn_doc').on('change', function() {
 //     //document.getElementById("ckeditor").value = "asdf";
 //     $.ajax({
 //       method: 'GET',
 //       url: '/admin/send_document/get_document/'+ this.value,
 //     }).done( function (response) {
 //        //alert(response);
 //       $("#editor").trumbowyg('html',response);
 //     });
  // })

  // $('#client').on('change', function() {
 //     //document.getElementById("ckeditor").value = "asdf";
 //      //alert("document: "+document.getElementById("stn_doc").value);
 //     $.ajax({
 //       method: 'GET',
 //       url: '/admin/send_document/get_user/'+ this.value+"/"+ document.getElementById("stn_doc").value,
 //     }).done( function (response) {
 //      $("#editor").trumbowyg('html',response.content);
 //      // alert("content: "+response.content+" "+response.user.account[0].legal_name);
  //    $("#legal_name").val(response.user.account[0].legal_name);
  //    $("#address").val(response.user.account[0].address);
  //    $("#phone").val(response.user.account[0].phone);
  //    $("#primary_contact").val(response.user.account[0].primary_contact);
  //    $("#project_name").val(response.user.account[0].project_name);
 //     });
  // })


});