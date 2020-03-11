$('#editTurmaModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const id = button.data('id');
  const nome = button.data('nome');
  const modal = $(this);
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #nome').val(nome);
});

$('#deleteTurmaModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const turmaId = button.data('turma_id');
  const modal = $(this);
  modal.find('.modal-body #turma_id').val(turmaId);
});
