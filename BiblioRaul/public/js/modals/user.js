$('#editUserModal').on('show.bs.modal', (event) => {
  const button = $(event.relatedTarget);
  const id = button.data('id');
  const nome = button.data('nome');
  const email = button.data('email');
  const modal = $(this);
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #name').val(nome);
  modal.find('.modal-body #email').val(email);
});

$('#deleteUserModal').on('show.bs.modal', (event) => {
  const button = $(event.relatedTarget);
  const userId = button.data('user_id');
  const modal = $(this);
  modal.find('.modal-body #user_id').val(userId);
});
