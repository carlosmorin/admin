///CONTANTES URLS->
//LOCAL 

//const URL = "http://localhost/admin_albardas/";  
const URL = "http://localhost/admin_albardas/";  

//PRODUCCION
//const URL = "http://lasalbardas.com/ADMIN/";  
//const URL = "http://lasalbardas.com/TESTS/";  
$(document).ready(function(){
 
    $("div.spinner").addClass("hidden");
    $("div.bgLightBlack").addClass("hidden");

  $("#id_product").change(function () {
    var name = $("#id_product option:selected").text();
  
    $("input#name_product").val($("#id_product option:selected").text());
  });

});

$("input.remision").keyup(function () {
    importe_total = 0;
    $("input.remision").each(
        function(index, value) {
        importe_total = importe_total + eval($(this).val());
        $("input#importe_total").val(importe_total);
        }
    );
    
});



$("input#flete").change(function () {
    $("input.price_flete").toggleClass('hidden').attr("required", true);
    $("select.price_flete").toggleClass('hidden').attr("required", true);
});




 function getGET()
{
    // capturamos la url
    var loc = document.location.href;
    // si existe el interrogante
    if(loc.indexOf('?')>0)
    {
        // cogemos la parte de la url que hay despues del interrogante
        var getString = loc.split('?')[1];
        // obtenemos un array con cada clave=valor
        var GET = getString.split('&');
        var get = {};
        // recorremos todo el array de valores
        for(var i = 0, l = GET.length; i < l; i++){
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
        //console.log(get.employe);
    }
}

function getEmploye(obj){
    var data = getGET();
    var nCharge = data.nCharge;
    var tab = data.tab;
    var employe = $(obj).val();
    location.href= URL+"referrals/?nCharge="+nCharge+"&tab="+tab+"&employe="+employe+"&costumer=0";
}

function setDates(){
    event.preventDefault();
    var data = getGET();
    var id = data.id;
    var startDate = $("input#startDate").val();
    var endDate = $("input#endDate").val();
    location.href= URL+"personal/paysheet/?id="+id+"&start_date="+startDate+"&end_date="+endDate+"";
}

function getCostumer(obj){
   
    var val = $(obj).val();

    var data = getGET();
    var nCharge = data.nCharge;
    var tab = data.tab;
    var employe = data.employe;
    location.href= URL+"referrals/?nCharge="+nCharge+"&tab="+tab+"&employe="+employe+"&costumer="+val+"";
    
}
function validateQuantity(obj) {
    var quantity = $("select#prod option:selected").attr("data-quantity");
    var quantity2 = $(obj).val();
    parseInt(quantity);
    parseInt(quantity2);

    if (quantity2 > quantity) {
        alert("la cantidad no es valida");
        $(obj).val('');
    }else if(quantity2 <= 0){
        alert("la cantidad no es valida");
        $(obj).val('');
    }

}

function selectId(obj) {
    var id_product = $("select#prod option:selected").attr("data-id");
    var name_product = $("select#prod option:selected").attr("data-name");
    $("input#id_product").val(id_product);
    $("input#name_product").val(name_product);
    // body...
}
function validateEntry(obj) {
    var val = $(obj).val();
    var val2 = $("select#exit").val();

    if (val == val2) {
        alert("los almacenes no deben de ser higuales");
        $(obj).val('');
    }else{
        return false;
    }

   
  }


function nCharge(obj){
        
    var tab = $(obj).val();
    location.href= URL+"referrals/?nCharge="+tab+"&tab=1&employe=4&costumer=0&transport=0&driver=0&box=0&box_2=0&truck=0&add=0";

}

function setUrl(obj){
    var data = getGET();
    
    var val = $(obj).val();
    var id = $(obj).attr("id");



    var parameters = {
      nCharge: data.nCharge,
      tab: data.tab,
      employe: data.employe,
      costumer: data.costumer,
      transport: data.transport,
      driver: data.driver,
      box: data.box,
      box_2: data.box_2,
      truck: data.truck,
      add: data.add,
      url: data.url
    }
   
  
    for (var par in parameters){
        if (par = id) {
             parameters[par] = val;
        }
    }
    location.href= URL+"referrals/?nCharge="+parameters['nCharge']+"&tab="+parameters['tab']+"&employe="+parameters['employe']+"&costumer="+parameters['costumer']+"&transport="+parameters['transport']+"&driver="+parameters['driver']+"&box="+parameters['box']+"&box_2="+parameters['box_2']+"&truck="+parameters['truck']+"&add="+parameters['add']+"";
}


function setUrlEdit(obj){
    var data = getGET();
    
    var val = $(obj).val();
    var id = $(obj).attr("id");

    var parameters = {
        id_ref: data.id_ref,
        nCharge: data.nCharge,
        tab: data.tab,
        employe: data.employe,
        costumer: data.costumer,
        transport: data.transport,
        driver: data.driver,
        box: data.box,
        box_2: data.box_2,
        truck: data.truck,
        add: data.add,
        url: data.url
    }
   
    
    for (var par in parameters){
        if (par = id) {
             parameters[par] = val;
        }
    }
    if (true) {}
    location.href= URL+"referrals/edit/?id_ref="+parameters['id_ref']+"&employe="+parameters['employe']+"&costumer="+parameters['costumer']+"&transport="+parameters['transport']+"&driver="+parameters['driver']+"&box="+parameters['box']+"&box_2="+parameters['box_2']+"&truck="+parameters['truck']+"&add="+parameters['add']+"";
}

function saveGroup(obj) {

    event.preventDefault();
  
   //return false;
    /**var name = $("input#name").val();
    var liable = $("input#liable").val();
    var Npeople = $("input#nPeople").val();
    var coments = $("input#coments").val();
    var data = {'name='name,'liable='liable,'nPeople='nPeople,'coments='coments}**/

    var formData = new FormData($('form#saveGroup')[0]);

    $.ajax({
        url: "saveGroup/",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            alert("buscando");
        },
        error: function(jqXHR, exception){
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
        success: function(status){
            location.reload();

            alert("enviado");
        }

    });
}

function saveFreight(obj) {
    event.preventDefault();
    var quantity = $("input#quantity").val();
    importe_total = 0;
        $("input.remision").each(
            function(index, value) {
            importe_total = importe_total + eval($(this).val());
            }
        );
        $("input#importe_total").val(importe_total);
        
        if (quantity != importe_total) {
            alert("El precio tiene que ser higual al total");
            $("input.remision").val('');
             $("input#importe_total").val('');
             return false;
        }else{
            
            var formData = new FormData($(obj)[0]);
            $.ajax({
                url: URL+"referrals/savefreight/",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                

                },
                error: function(jqXHR, exception){
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    alert(msg);
                },
                success: function(status){

                    swal("Ok!", "Informacion correcta", "success");   
                    closeModal2();
                }
            });
        }    
}
/*
function saveWork(obj){
    event.preventDefault();
     var formData = new FormData($(obj)[0]);
   
    $.ajax({
        url: "saveWork/",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            alert("buscando");
        },
        error: function(jqXHR, exception){
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
        success: function(status){
            location.reload();

            alert("enviado");
        }

    });
}
 */   
function saveAs(obj){
    event.preventDefault();
    alert();
}

function discount_work2(obj){
  event.preventDefault();

    var formData = new FormData($('form#discount_work')[0]);

    var ruta = "CLASS/personal.php";
    $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos)
        {
          $('form#discount_work')[0].reset();
          swal("Ok!", "Usuario registrado", "success");
          closeModal();
        }
    }); 
}

function deleteWork(obj){
    event.preventDefault();

    var url = $(obj).attr('href');
    swal({
      title: "Estas seguro?",
      text: "eliminar trabajador",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        url: url,
        type: "GET",
        data: "",
        contentType: false,
        processData: false,
        success: function(datos)
        {
            swal("trabajador eliminado|!", {
              icon: "success",
            });
            location.reload();
           
        }
    }); 
      } else {
        swal("Operacion cancelada");
      }
    });
}

function updateWork(obj){
    event.preventDefault();
    var formData = new FormData($(obj)[0]);
   
     
    $.ajax({
        url: "editWork/",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            alert("buscando");
        },
        error: function(jqXHR, exception){
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
        success: function(status){
            alert("enviado");   
            window.location= URL+"personal/";


        }

    });

}

///FUNCIONES DE CLIENTES//

//funcion de eliminar cliente
function deleteCostumer(obj){
 event.preventDefault();

    var url = $(obj).attr('href');
    swal({
      title: "Estas seguro?",
      text: "eliminar cliente",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        url: url,
        type: "GET",
        data: "",
        contentType: false,
        processData: false,
        success: function(datos)
        {
            swal("empresa eliminada !", {
              icon: "success",
            });
            location.reload();
           
        }
    }); 
      } else {
        swal("Operacion cancelada");
      }
    });
}
 
function addP(obj){
    event.preventDefault();
    
    var id = $(obj).attr('href');
    var quantity = $(obj).parent('th').siblings('th.quant').find("input").val();
   // alert(quantity);
    if (quantity == '') {
        alert("la cantidad no puede ser 0");
    }else{
        var url = URL+"referrals/addProduct/?id="+id+"&quantity="+quantity;
        $.get(url, function(data, status){
            alert("Producto agregado");
            location.reload();
        });

    }
     
}

function eraseP(obj){
    event.preventDefault();
    var id = $(obj).attr('href');
    var url = URL+"referrals/delete/?id="+id;
    $.get(url, function(data, status){
        location.reload();
        //alert("ya");
    });
}

function generateRemision(obj){
    
    event.preventDefault();

    var formData = new FormData($(obj)[0]);

    var data = getGET();
    var nCharge = data.nCharge;
    var tab = data.tab;
    
    var parameters = {
      nCharge: data.nCharge,
      tab: data.tab,
      employe: data.employe,
      costumer: data.costumer,
      transport: data.transport,
      driver: data.driver,
      box: data.box,
      box_2: data.box_2,
      truck: data.truck,
      add: data.add
    }
    var employe = $(obj).val();

    var newTab = parseInt(tab) + parseInt(1);
    var nTabs = $("li.tabP").length

    $.ajax({
        url: URL+"referrals/generateRemision/",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $("div.spinner").removeClass("hidden");
            $("div.bgLightBlack").removeClass("hidden");

        },
        error: function(jqXHR, exception){
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
        success: function(status){

             swal("Ok!", "Remision generada con exito", "success");   
            //window.location= URL+"referrals/";
            if (newTab > nTabs) {

                setTimeout(redirect, 3000);    
                function redirect(){
                    location.href= URL+"referrals/";
                }
            }else{
                setTimeout(redirect2, 2000);    
                function redirect2(){
                   // location.href= URL+"referrals?nCharge="+nCharge+"&tab="+newTab+"&employe=3&costumer=0";
                    location.href= URL+"referrals/?nCharge="+nCharge+"&tab="+newTab+"&employe="+parameters['employe']+"&costumer="+parameters['costumer']+"&transport="+parameters['transport']+"&driver="+parameters['driver']+"&box="+parameters['box']+"&box_2="+parameters['box_2']+"&truck="+parameters['truck']+"&add="+parameters['add']+"";

                }
               

            }



        }

    });
}


function editRemision(obj){
    
    event.preventDefault();

    var formData = new FormData($(obj)[0]);
     
    $.ajax({
        url: URL+"referrals/editRemision/",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $("div.spinner").removeClass("hidden");
            $("div.bgLightBlack").removeClass("hidden");

        },
        error: function(jqXHR, exception){
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
        success: function(status){
             swal("Ok!", "Remision actualizada con exito", "success");   
            //window.location= URL+"referrals/";
            setTimeout(redirect_control, 3000);    
            function redirect_control(){
                location.href= URL+"referrals/control/";
            }
                            

        }



        });

}


function calcular_total(obj) {

    event.preventDefault();
    var tr = $(obj).parent("td").parent("tr");
    var id_work = tr.find("th:nth-child(2)").find("input").val();
    var jueves = tr.find("th:nth-child(3)").find("select.day").val();
    var viernes = tr.find("th:nth-child(4)").find("select.day").val();
    var sabado = tr.find("th:nth-child(5)").find("select.day").val();
    var domingo = tr.find("th:nth-child(6)").find("select.day").val();
    var lunes = tr.find("th:nth-child(7)").find("select.day").val();
    var martes = tr.find("th:nth-child(8)").find("select.day").val();
    var miercoles = tr.find("th:nth-child(9)").find("select.day").val();
    var date = $("input#startDate").val();
    var end_date = $("input#endDate").val();

   $.post(URL+"personal/savePayshet/",
    {
        id_work: id_work,
        date: date,
        end_date: end_date,
        jueves: jueves,
        viernes: viernes,
        sabado: sabado,
        domingo: domingo,
        lunes: lunes,
        martes: martes,
        miercoles: miercoles
    }, function(data, status){
        alert("Data:\nStatus: " + status);
    });
 // $("#total").val(importe_total * 160 );
}




function saveSupplies(obj){
    event.preventDefault();
    var formData = new FormData($(obj)[0]);

     $.ajax({
        url: URL+"requisitions/saveSupplies/",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            //alert("generando remision");
        },
        error: function(jqXHR, exception){
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
        success: function(status){

            $('form#saveSupplies')[0].reset();
            swal("Ok!", "Porducto  registrado", "success"); 
            //window.location= URL+"referrals/";
        }

    });
}

//GUARDAR ASISTENCIA DE NOMINA
function savePayshet(obj){
    event.preventDefault();
    var formData = new FormData($(obj)[0]);

    $.ajax({
        url: URL+"personal/savePayshet/",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
            //alert("generando remision");
        },
        error: function(jqXHR, exception){
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
        success: function(status){

            $(obj)[0].reset();
            $(obj).parent("div.mainC").toggleClass("h0");
            $(obj).parent("div.mainC").toggleClass("hAuto");
            swal("Ok!", "Asistencia registrada", "success"); 
             
            //window.location= URL+"referrals/";
        }

    });

}

//FUNCIONES AJAX PARA DIRECCIONES
function deleteAddress(obj){
 event.preventDefault();


    var url = $(obj).attr('href');
    swal({
      title: "Estas seguro?",
      text: "eliminar direccion",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        url: url,
        type: "GET",
        data: "",
        contentType: false,
        processData: false,
        success: function(datos)
        {
            swal("Direcion eliminada !", {
              icon: "success",
            });
            location.reload();
           
        }
    }); 
      } else {
        swal("Operacion cancelada");
      }
    });
}

function erase(obj){
    event.preventDefault();
    var url = $(obj).attr('href');
    swal({
      title: "Estas seguro?",
      text: "eliminar este registro",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        url: url,
        type: "GET",
        data: "",
        contentType: false,
        processData: false,
        success: function(datos)
        {
            swal("Registro eliminado !", {
              icon: "success",
            });
            location.reload();
           
        }
    }); 
      } else {
        swal("Operacion cancelada");
      }
    });
}


