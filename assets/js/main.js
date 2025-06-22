var Script = function() {

    $("body").on("click", ".onConfirmeAction", function (event) {
        event.preventDefault();
        let question   = $(this).attr("data-question");
        let direcionar = $(this).attr("href");

        swal({
                title: "Você tem Certeza?",
                text: question,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Sim",
                cancelButtonText: "Não",
                closeOnConfirm: false
            },
            function () {
                $.post(direcionar, function(data){
                    swal( data.title, data.msg, data.status);
                    if (data.url) {
                        setTimeout(function () {
                            window.location.href = data.url;
                            return false;
                        }, 500);
                    }
                }, "json");
            });
    });

    // Sliding Topbar Metro Menu
    var menu = $('#topbar-dropmenu');
    var items = menu.find('.metro-tile');

    // Toggle menu and active class on icon click
    $('.topbar-menu-toggle').on('click', function() {
        $( "html" ).scrollTop( 0 );
       // If dropmenu is using alternate style we don't show modal
       if (menu.hasClass('alt')) {
          // Toggle menu and active class on icon click
          menu.slideToggle(230).toggleClass('topbar-menu-open');
       }
       else {
          menu.slideToggle(230).toggleClass('topbar-menu-open');
          $(items).addClass('animated animated-short fadeInDown').css('opacity', 1);
       }
       return false;
    });

    $("body").on("click", ".onConfirmeDel", function (event) {
        event.preventDefault();
        let question   = $(this).attr("data-question");
        let direcionar = $(this).attr("href");
        let callback   = $(this).attr("data-callback");
        let remove     = $(this).attr("data-remove");

        swal({
            title: "Você tem Certeza?",
            text: question,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Sim",
            cancelButtonText: "Não",
            closeOnConfirm: false
            },
            function () {
                $.post(direcionar, function(data){
                    swal( data.title, data.msg, data.status);
                    if (remove){
                        $(remove).remove();
                    }
                    if(data.id){
                        $("#list_"+data.id).remove();
                    }
                    if (data.url) {
                        setTimeout(function () {
                            window.location.href = data.url;
                            return false;
                        }, 500);
                    }

                    // ---------------------
                    // Função auxiliar extra
                    // ---------------------
                    if (callback != '' && callback != undefined) {
                        if (jQuery.isFunction(customFunction[callback])) {
                            customFunction[callback](data);
                        }
                    }
                }, "json");
            });
    });

    /* Busca endereço */
    $(".buscaEndereco").on("click", function(){
        let button = $(this);
        let prefix = $(this).attr('data-prefix');
        let cep = $("input[name='"+$(this).attr('data-prefix')+"cep']").val();
        $.ajax({
            url: "https://viacep.com.br/ws/"+cep+"/json/",
            dataType: "json",
            beforeSend: function( xhr ) {
                button.attr("disabled", true);
            }
        })
            .done(function( data ) {
                $("input[name='"+prefix+"logradouro']").val(data.logradouro);
                $("input[name='"+prefix+"bairro']").val(data.bairro);
                $("input[name='"+prefix+"cidade']").val(data.localidade);
                $("input[name='"+prefix+"estado']").val(data.uf);
                $("input[name='"+prefix+"ibge']").val(data.ibge);
                $("input[name='"+prefix+"numero']").focus();
            })
            .always(function() {
                button.attr("disabled", false);
            });
    });

    $('body .forceUppercase').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });


     /*
     *
     * Carregamento padrão para busca do estado
     *
     */
    $("body").on("change", ".onEstado" , function (){

        let objCidade = $("."+$(this).attr("data-target"));
        let valEstado = $(this).val();

        objCidade.empty(); /* Zera devido alteração */
        objCidade.append( new Option("Selecione uma cidade", ''));
        $.post("AuxLocalizacao/getCidade/"+valEstado, function(data){
            $.each(data.metadata, function( index , value ){
                objCidade.append( new Option( value.cid_titulo , value.cid_id ));
            });
        }, "json");

    });

    /* Padrão de Impressão */
    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    $("body").on("click", ".actionPrint", function () {
        let titulo                  = $(this).attr('data-titulo');
        let tituloLateral           = $(this).attr('data-cabecalho');
        let usuario                 = $(this).attr("data-user");
        let post                    = $(this).attr("data-post");
        let false_foter             = $(this).attr("data-foter");
        var data              = new Date();
        let dataView         = '';

        var topo = '<table class="col-print-12" style="margin-bottom: -30px"><tr><td><img src="/admin/assets/img/logo.png" width="200px" /></td><td width="50%" ><p class="titulo-topo">' + tituloLateral + '</p></td></tr><tr><td colspan="2"><p class="tituloPrincipal">' + titulo + '</p></td></tr></table>';
        if(!false_foter){
            var footer = '';
        }
        if(post == 'true'){

            $.post($(this).attr("data-href"), function (data) {
                $("#printArea").html(data.html);
                $("#printArea").printArea({
                    mode: "iframe",
                    standard: "html5",
                    popClose: false,
                    extraCss: '/admin/assets/fonts/css/all.min.css, /admin/assets/css/print.css',
                    extraHead: topo,
                    extraFooter: footer,
                    printAlert: true,
                    printMsg: 'Aguarde a impressão',
                    retainAttr: ["id", "class", "style"]
                });
            }, "json");
        }else{
            $($(this).attr("data-href")).printArea({
                mode: "iframe",
                standard: "html5",
                popClose: false,
                extraCss: '/admin/assets/fonts/css/all.min.css, /admin/assets/css/print.css',
                extraHead: topo,
                extraFooter: footer,
                printAlert: true,
                printMsg: 'Aguarde a impressão',
                retainAttr: ["id", "class", "style"]
            });
        }
        return false;
    });




    if ($.fn.dataTable) {
        $('[data-provide="datatable"]').each (function () {
            $(this).addClass ('dataTable-helper')
            var defaultOptions = {
                    paginate: false,
                    search: false,
                    info: false,
                    lengthChange: false,
                    displayRows: 10
                },
                dataOptions = $(this).data (),
                helperOptions = $.extend (defaultOptions, dataOptions),
                $thisTable,
                tableConfig = {}

            tableConfig.iDisplayLength = helperOptions.displayRows
            tableConfig.bFilter = true
            tableConfig.bSort = true
            tableConfig.bPaginate = false
            tableConfig.bLengthChange = false
            tableConfig.bInfo = false

            if (helperOptions.paginate) { tableConfig.bPaginate = true }
            if (helperOptions.lengthChange) { tableConfig.bLengthChange = true }
            if (helperOptions.info) { tableConfig.bInfo = true }
            if (helperOptions.search) { $(this).parent ().removeClass ('datatable-hidesearch') }

            tableConfig.aaSorting = []
            tableConfig.aoColumns = []

            $(this).find ('thead tr th').each (function (index, value) {
                var sortable = ($(this).data ('sortable') === true) ? true : false
                tableConfig.aoColumns.push ({ 'bSortable': sortable })

                if ($(this).data ('direction')) {
                    tableConfig.aaSorting.push ([index, $(this).data ('direction')])
                }
            })

            // Create the datatable
            $thisTable = $(this).dataTable (tableConfig)

            if (!helperOptions.search) {
                $thisTable.parent ().find ('.dataTables_filter').remove ()
            }

            var filterableCols = $thisTable.find ('thead th').filter ('[data-filterable="true"]')

            if (filterableCols.length > 0) {
                var columns = $thisTable.fnSettings().aoColumns,
                    $row, th, $col, showFilter

                $row = $('<tr>', { cls: 'dataTable-filter-row' }).appendTo ($thisTable.find ('thead'))

                for (var i=0; i<columns.length; i++) {
                    $col = $(columns[i].nTh.outerHTML)
                    showFilter = ($col.data ('filterable') === true) ? 'show' : 'hide'

                    th = '<th class="' + $col.prop ('class') + '">'
                    th += '<input type="text" class="form-control input-sm ' + showFilter + '" placeholder="' + $col.text () + '">'
                    th += '</th>'
                    $row.append (th)
                }

                $row.find ('th').removeClass ('sorting sorting_disabled sorting_asc sorting_desc sorting_asc_disabled sorting_desc_disabled')

                $thisTable.find ('thead input').keyup( function () {
                    $thisTable.fnFilter( this.value, $thisTable.oApi._fnVisibleToColumnIndex(
                        $thisTable.fnSettings(), $thisTable.find ('thead input[type=text]').index(this) ) )
                })

                $thisTable.addClass ('datatable-columnfilter')
            }
        })

        $('.dataTables_filter input').prop ('placeholder', 'Search...')
    }

    if ($(window).width() <= 601) {

        $('[data-target="#navbarSupportedContent-4"]').on("click", function (event) {

            let isOpen = $('#navbarSupportedContent-4').hasClass('show');
            if (isOpen) {

                if ($('.sub-header.buttons-actions').length) {
                    $('.page-header').attr('style', 'padding-top: 101px !important');
                } else {
                    $('.page-header').attr('style', '');
                }

            } else {
                $('.page-header').attr('style', 'padding-top: 121px !important');
            }

        });

        $(document).ready(function(){
            if ($('.sub-header.buttons-actions').length) {
                $('.page-header').attr('style', 'padding-top: 101px !important');
            }
        })
    }
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('select option:disabled').forEach(function(option) {
            if (!option.textContent.includes('🔒')) {
                option.textContent = '🔒 ' + option.textContent;
            }
        });
    });

    $( ".select2Simples").select2( {
    theme: "bootstrap",
    language: "pt-BR"} );

    $('.select-usuario').select2({
      theme: "bootstrap",
      language: "pt-BR",
      minimumInputLength: 3,
      ajax: {
        url: 'usuarios/get_usuarios',
        dataType: 'json',
        processResults: function (data) {
          // Transforms the top-level key of the response object from 'items' to 'results'
          return {
            results: data
          };
        }
      }
    });

}();

var idleRefresh;
idleRefresh = setTimeout("location.href = '/login/logout';", 30000000);
document.onmousemove = function () {
    clearTimeout(idleRefresh);
    idleRefresh = setTimeout("location.href = '/login/logout';", 3000000);
};
