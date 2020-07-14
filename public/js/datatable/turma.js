// Call the DataTables jQuery plugin
$(document).ready(() => {
  $('#dataTable').DataTable({
    dom: 'Bfrtip',
    colReorder: true,
    fixedHeader: true,
    responsive: true,
    sScrollX: '100%',
    lengthMenu: [
      [10, 15, 20, -1],
      ['10 linhas', '15 linhas', '20 linhas', 'Mostrar tudo'],
    ],
    buttons: [
      {
        extend: 'print',
        text: 'Imprimir',
        className: 'btn btn-sm btn-primary btn-shadow-sm',
        exportOptions: {
          columns: [0],
        },
      },
      {
        extend: 'pdf',
        className: 'btn btn-sm btn-primary btn-shadow-sm',
        exportOptions: {
          columns: [0],
        },
      },
      {
        extend: 'pageLength',
        className: 'btn btn-sm btn-primary btn-shadow-sm',
      },
    ],
    language: {
      sEmptyTable: 'Nenhum registo encontrado',
      sInfo: 'A mostrar <b>_START_</b> até <b>_END_</b> de <b>_TOTAL_</b> registos',
      sInfoEmpty: 'A mostrar 0 até 0 de 0 registos',
      sInfoFiltered: '(Filtrados de _MAX_ registos)',
      sInfoPostFix: '',
      sInfoThousands: '.',
      sLengthMenu: '_MENU_ resultados por página',
      sLoadingRecords: 'A carregar...',
      sProcessing: 'A processar...',
      sZeroRecords: 'Nenhum registo encontrado',
      sSearch: 'Pesquisar',
      oPaginate: {
        sNext: '<i class="fas fa-chevron-right"></i>',
        sPrevious: '<i class="fas fa-chevron-left"></i>',
        sFirst: 'Primeiro',
        sLast: 'Último',
      },
      oAria: {
        sSortAscending: ': Ordenar colunas de forma ascendente',
        sSortDescending: ': Ordenar colunas de forma descendente',
      },
      select: {
        rows: {
          _: 'Selecionadas %d linhas',
          0: 'Nenhuma linha selecionada',
          1: 'Selecionada 1 linha',
        },
      },
      buttons: {
        pageLength: {
          _: 'A mostrar %d linhas',
          '-1': 'A mostrar todas as linhas',
        },
      },
    },
    columnDefs: [
      { width: '95%', targets: 0 },
      { width: '5%', targets: 1 },
    ],
    columns: [{ orderable: true }, { orderable: false }],
  });
});

// Remove DataTables' default classes
$(document).ready(() => {
  $('button').removeClass('btn-secondary');
});
