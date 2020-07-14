// Call the DataTables jQuery plugin
$(document).ready(() => {
  const table = $('#dataTable').DataTable({
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
        extend: 'copy',
        text: 'Copiar',
        className: 'btn btn-sm btn-primary btn-shadow-sm',
        exportOptions: {
          columns: [3, 0, 2, 4],
        },
      },
      {
        extend: 'print',
        text: 'Imprimir',
        className: 'btn btn-sm btn-primary btn-shadow-sm',
        exportOptions: {
          columns: [3, 0, 2, 4],
        },
      },
      {
        extend: 'pdf',
        className: 'btn btn-sm btn-primary btn-shadow-sm',
        exportOptions: {
          columns: [3, 0, 2, 4],
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
    columns: [
      {
        width: '0%',
        orderable: false,
        visible: false,
      },
      { width: '15%', orderable: true },
      { width: '13%', orderable: true },
      { width: '35%', orderable: true },
      { width: '15%', orderable: true },
      { width: '15%', orderable: true },
      { width: '5%', orderable: false },
    ],
    drawCallback() {
      const pagination = $(this)
        .closest('.dataTables_wrapper')
        .find('.dataTables_paginate');
      pagination.toggle(this.api().page.info().pages > 1);
    },
  });
  table.columns.adjust().draw();
});

// Remove DataTables' default classes
$(document).ready(() => {
  $('button').removeClass('btn-secondary');
});
