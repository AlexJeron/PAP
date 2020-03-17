$('#editRecursoModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const id = button.data('id');
  const nome = button.data('nome');
  const quantidadeTotal = button.data('quantidade_total');
  const danificados = button.data('danificados');
  const modal = $(this);
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #name').val(nome);
  modal.find('.modal-body #quantidade_total').val(quantidadeTotal);
  modal.find('.modal-body #danificados').val(danificados);
});

$('#deleteRecursoModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const recursoId = button.data('recurso_id');
  const modal = $(this);
  modal.find('.modal-body #recurso_id').val(recursoId);
});
