$(document).ready(function() {
  openModal2(null, "freight");
  $("#products").selectpicker();
  event.preventDefault();
  var $lateral_menu_trigger = $("#cd-menu-trigger"),
    $content_wrapper = $(".cd-main-content"),
    $navigation = $("header");

  //open-close lateral menu clicking on the menu icon
  $lateral_menu_trigger.on("click", function(event) {
    event.preventDefault();

    $lateral_menu_trigger.toggleClass("is-clicked");
    $navigation.toggleClass("lateral-menu-is-open");
    $content_wrapper
      .toggleClass("lateral-menu-is-open")
      .one(
        "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
        function() {
          // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
          $("body").toggleClass("overflow-hidden");
        }
      );
    $("#cd-lateral-nav").toggleClass("lateral-menu-is-open");

    //check if transitions are not supported - i.e. in IE9
    if ($("html").hasClass("no-csstransitions")) {
      $("body").toggleClass("overflow-hidden");
    }
  });

  //close lateral menu clicking outside the menu itself
  $content_wrapper.on("click", function(event) {
    if (!$(event.target).is("#cd-menu-trigger, #cd-menu-trigger span")) {
      $lateral_menu_trigger.removeClass("is-clicked");
      $navigation.removeClass("lateral-menu-is-open");
      $content_wrapper
        .removeClass("lateral-menu-is-open")
        .one(
          "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
          function() {
            $("body").removeClass("overflow-hidden");
          }
        );
      $("#cd-lateral-nav").removeClass("lateral-menu-is-open");
      //check if transitions are not supported
      if ($("html").hasClass("no-csstransitions")) {
        $("body").removeClass("overflow-hidden");
      }
    }
  });

  //open (or close) submenu items in the lateral menu. Close all the other open submenu items.
  $(".item-has-children")
    .children("a")
    .on("click", function(event) {
      event.preventDefault();
      $(this)
        .toggleClass("submenu-open")
        .next(".sub-menu")
        .slideToggle(200)
        .end()
        .parent(".item-has-children")
        .siblings(".item-has-children")
        .children("a")
        .removeClass("submenu-open")
        .next(".sub-menu")
        .slideUp(200);
    });

  ////********************/////
  $(document).ready(function() {
    // Obtengo la url actual
    let url = window.location.pathname;
    // Cortamos la primara diagonal "/"
    url = url.substr(1);
    // Cortamos la ultima diagonal "/"
    let url_limpia = url.substr(0, url.lastIndexOf("/"));
    // Creamos el arreglo con split
    let url_array = url_limpia.split("/");
    // console.log('array url: '+url_array.length);
    // Obtenemos el path de la posicion del arreglo
    let pathName;
    /* si el arreglo de la url es igual a 3
        entonces el path lo igualamos a la posicion 2 del arreglo
        [0,1,2]
    */

    if (url_array.length == 3) {
      pathName = url_array[2];
    } else {
      // de lo contrario si por defecto como ya se sabe
      // se utiliza la posicion 1 es decir [0,1]
      // [0]= admin_albardas
      // [1] = transporters
      // [2] = drivers
      pathName = url_array[1];
    }
    // console.log(pathName);

    switch (pathName) {
      case "control":
        $("table#tableReferrals")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Remisiones",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5, 6]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Remisiones",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5, 6]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "personal":
        $("table#tableWorks")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Personal",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Personal",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "products":
        $("table#tableProducts")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Productos",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5, 6]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Productos",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5, 6]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "freights":
        $("table#tableFreights")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Fletes",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Fletes",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "users":
        $("table#tableUsers")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Usuarios",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Usuarios",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "costumers":
        $("table#tableCostumers")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Clientes",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Clientes",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "transporters":
        $("table#tableTransporters")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Transportistas",
                exportOptions: {
                  columns: [0, 1, 2, 3]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Transportistas",
                exportOptions: {
                  columns: [0, 1, 2, 3]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;

      case "drivers":
        $("table#tableTransporters")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Choferes",
                exportOptions: {
                  columns: [0, 1, 2, 3]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Choferes",
                exportOptions: {
                  columns: [0, 1, 2, 3]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "box":
        $("table#tableTransportersBox")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Cajas",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Cajas",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "trucks":
        $("table#tableTransportersTrucks")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Trailers",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Trailers",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
          .DataTable();
        break;
      case "address":
        $("table#tableCostumersAddress")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Direcciones de Clientes",
                exportOptions: {
                  columns: [0, 1, 2, 3]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Direcciones de Clientes",
                exportOptions: {
                  columns: [0, 1, 2, 3]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
        .DataTable();
      break; 
       case 'referrals': 
         $('table#tableProducts')
        .dataTable({
          aProcessing: true, //Activamos el procesamiento del datatables
          aServerSide: true, //Paginacion y filtrado realizados por el servidor
          dom:
            "<'row'<'text-center ' <''B>>>" +
            "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-lg-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>", 
          buttons: [
            // {
            //   extend: "excelHtml5",
            //   text:'<span class="icon-microsoftexcel"></span>',
            //   className: "btn btn-success btn-lg",
            //   title: "Reporte de Direcciones de Clientes",
            //   exportOptions: {
            //     columns: [0, 1, 2, 3]
            //   },
            //   titleAttr: "Excel"
            // },
            // {
            //   extend: "pdfHtml5",
            //   text:'<span class="icon-picture_as_pdf"></span>',
            //   className: "btn btn-danger btn-lg",
            //   title: "Reporte de Direcciones de Clientes",
            //   exportOptions: {
            //     columns: [0, 1, 2, 3]
            //   },
            //   titleAttr: "PDF"
            // }
          ],
          language: {
            url:
              "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          }
        })
        .DataTable();
      break; 
       case 'edit': 
         $('table#tableProducts').dataTable({
          aProcessing: true, //Activamos el procesamiento del datatables
          aServerSide: true, //Paginacion y filtrado realizados por el servidor
          dom:
            "<'row'<'text-center ' <''B>>>" +
            "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-lg-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>", 
          buttons: [
            // {
            //   extend: "excelHtml5",
            //   text:'<span class="icon-microsoftexcel"></span>',
            //   className: "btn btn-success btn-lg",
            //   title: "Reporte de Direcciones de Clientes",
            //   exportOptions: {
            //     columns: [0, 1, 2, 3]
            //   },
            //   titleAttr: "Excel"
            // },
            // {
            //   extend: "pdfHtml5",
            //   text:'<span class="icon-picture_as_pdf"></span>',
            //   className: "btn btn-danger btn-lg",
            //   title: "Reporte de Direcciones de Clientes",
            //   exportOptions: {
            //     columns: [0, 1, 2, 3]
            //   },
            //   titleAttr: "PDF"
            // }
          ],
          language: {
            url:
              "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          }
        })
        .DataTable();
      break; 

      // nuevos scripts de proveedores y categorias
      case "suppliers":
        $("table#tableProviders")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Proveedores",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5, 6]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Proveedores",
                exportOptions: {
                  columns: [0, 1, 2, 3, 4, 5, 6]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
        .DataTable();
        $("table#tableCategory")
        .dataTable({
          aProcessing: true, //Activamos el procesamiento del datatables
          aServerSide: true, //Paginacion y filtrado realizados por el servidor
          dom:
            "<'row'<'text-center ' <''B>>>" +
            "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-lg-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
              extend: "excelHtml5",
              text: '<span class="icon-microsoftexcel"></span>',
              className: "btn btn-success btn-lg",
              title: "Reporte de Categorias",
              exportOptions: {
                columns: [0, 1, 2]
              },
              titleAttr: "Excel"
            },
            {
              extend: "pdfHtml5",
              text: '<span class="icon-picture_as_pdf"></span>',
              className: "btn btn-danger btn-lg",
              title: "Reporte de Categorias",
              exportOptions: {
                columns: [0, 1, 2]
              },
              titleAttr: "PDF"
            }
          ],
          language: {
            url:
              "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          }
        })
      .DataTable();
      break; 
      

      case "inventories":
        $("table#tableInventories")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Direcciones de Clientes",
                exportOptions: {
                  columns: [0, 1, 2]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Direcciones de Clientes",
                exportOptions: {
                  columns: [0, 1, 2]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
        .DataTable();
        break; 

        case "inventory":
        $("table#tableInventory")
          .dataTable({
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginacion y filtrado realizados por el servidor
            dom:
              "<'row'<'text-center ' <''B>>>" +
              "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
              "<'row'<'col-lg-12'tr>>" +
              "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                extend: "excelHtml5",
                text: '<span class="icon-microsoftexcel"></span>',
                className: "btn btn-success btn-lg",
                title: "Reporte de Direcciones de Clientes",
                exportOptions: {
                  columns: [0, 1, 2]
                },
                titleAttr: "Excel"
              },
              {
                extend: "pdfHtml5",
                text: '<span class="icon-picture_as_pdf"></span>',
                className: "btn btn-danger btn-lg",
                title: "Reporte de Direcciones de Clientes",
                exportOptions: {
                  columns: [0, 1, 2]
                },
                titleAttr: "PDF"
              }
            ],
            language: {
              url:
                "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
          })
        .DataTable();
        break; 


     


      // No se sabe cual es????
      // case 'supplies':
      //     $('table#tableSupplies').dataTable(
      //       {
      //         "aProcessing": true,//Activamos el procesamiento del datatables
      //         "aServerSide": true,//Paginacion y filtrado realizados por el servidor
      //         dom: "<'row'<'text-center ' <''B>>>"+
      //               "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
      //               "<'row'<'col-lg-12'tr>>" +
      //               "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      //         buttons: [
      //               {
      //                 extend: 'excelHtml5',
      //                 text: '<strong><i class="fa fa-file-excel-o"></i> Excel</strong>',
      //                 className: 'btn btn-success',
      //                 title: "Reporte de Plantillas",
      //                 // exportOptions: {
      //                 // columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
      //                 // },
      //                 titleAttr: 'Excel'
      //               },
      //               {
      //                 extend: 'pdfHtml5',
      //                 text: '<strong><i class="fa fa-file-pdf-o"></i> PDF</strong>',
      //                 className: 'btn btn-danger',
      //                 title: "Reporte de Plantillas",
      //                 // exportOptions: {
      //                 //   columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
      //                 // },
      //                 titleAttr: 'PDF'
      //               }
      //         ],
      //         "language": {
      //           "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      //         },

      //     }).DataTable();
      // break;
    }
  });


function delete(e) {
  e.preventDefault();
  alert();
}
