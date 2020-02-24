$('#editLocalModal').on('show.bs.modal', (event) => {
  const button = $(event.relatedTarget);
  const id = button.data('id');
  const nome = button.data('nome');
  const capacidade = button.data('capacidade');
  const modal = $(this);
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #nome').val(nome);
  modal.find('.modal-body #capacidade').val(capacidade);
});

$('#deleteLocalModal').on('show.bs.modal', (event) => {
  const button = $(event.relatedTarget);
  const localId = button.data('local_id');
  const modal = $(this);
  modal.find('.modal-body #local_id').val(localId);
});
