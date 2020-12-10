$(document).ready(function() {
    //
    /*
   var org_tabela = $('#org_tabela').DataTable({
       //
        responsive: true,

        lengthMenu: [[50, 100, 200, -1], [50, 100, 200, "All"]],
        fixedHeader: true,
        order: [[ 1, 'asc' ]],
        columnDefs: [ { 
        	orderable: false, 
        	targets: [0,3,4]
        }],
        language: {
            lengthMenu: "Exibir _MENU_ registros por pagina",
            zeroRecords: "Nada encontrado",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "Nenhum registro disponÃ­vel",
            infoFiltered: "(filtrado de _MAX_ total de registros)",
            decimal:        ",",
            thousands:      ".",
            loadingRecords: "Carregando...",
            processing:     "Processando...",
            search:         "Pesquisar:",
            paginate: {
                first:      "Primeira",
                last:       "Última",
                next:       "Próxima",
                previous:   "Anterior"
            }
        }
    });
    */
   $('#org_tabela').DataTable();
});