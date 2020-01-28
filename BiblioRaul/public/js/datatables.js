// Call the DataTables jQuery plugin
$(document).ready(function() {
    $("#dataTable").DataTable({
        dom: "Bfrtip",
        colReorder: true,
        fixedHeader: true,
        responsive: true,
        // keys: true,
        // select: true,
        lengthMenu: [
            [10, 15, 20, -1],
            ["10 linhas", "15 linhas", "20 linhas", "Mostrar tudo"]
        ],
        buttons: [
            {
                extend: "copy",
                text: "Copiar",
                className: "btn btn-sm btn-primary btn-shadow-sm"
            },
            {
                extend: "excel",
                className: "btn btn-sm btn-primary btn-shadow-sm"
            },
            {
                extend: "pdf",
                className: "btn btn-sm btn-primary btn-shadow-sm"
            },
            {
                extend: "print",
                text: "Imprimir",
                className: "btn btn-sm btn-primary btn-shadow-sm"
            },
            {
                extend: "pageLength",
                className: "btn btn-sm btn-primary btn-shadow-sm"
            }
        ],
        language: {
            sEmptyTable: "Nenhum registo encontrado",
            sInfo: "A mostrar de _START_ até _END_ de _TOTAL_ registos",
            sInfoEmpty: "A mostrar 0 até 0 de 0 registos",
            sInfoFiltered: "(Filtrados de _MAX_ registos)",
            sInfoPostFix: "",
            sInfoThousands: ".",
            sLengthMenu: "_MENU_ resultados por página",
            sLoadingRecords: "A carregar...",
            sProcessing: "A processar...",
            sZeroRecords: "Nenhum registo encontrado",
            sSearch: "Pesquisar",
            oPaginate: {
                sNext: "Próximo",
                sPrevious: "Anterior",
                sFirst: "Primeiro",
                sLast: "Último"
            },
            oAria: {
                sSortAscending: ": Ordenar colunas de forma ascendente",
                sSortDescending: ": Ordenar colunas de forma descendente"
            },
            select: {
                rows: {
                    _: "Selecionadas %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionada 1 linha"
                }
            },
            buttons: {
                pageLength: {
                    _: "A mostrar %d linhas",
                    "-1": "A mostrar todas as linhas"
                }
            }
        },
        columns: [
            { width: "5%" },
            { width: "42.5%" },
            { width: "42.5%" },
            { width: "10%" }
        ]
    });
});

// Remove DataTables' default classes
$(document).ready(function() {
    $("button").removeClass("btn-secondary");
});
