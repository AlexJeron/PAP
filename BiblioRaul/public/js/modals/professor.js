$('#editProfessorModal').on('show.bs.modal', (event) => {
  const button = $(event.relatedTarget);
  const id = button.data('id');
  const nome = button.data('nome');
  const email = button.data('email');
  const modal = $(this);
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #name').val(nome);
  modal.find('.modal-body #email').val(email);
});

$('#deleteProfessorModal').on('show.bs.modal', (event) => {
  const button = $(event.relatedTarget);
  const profId = button.data('prof_id');
  const modal = $(this);
  modal.find('.modal-body #prof_id').val(profId);
});
