$('#editUserModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const id = button.data('id');
  const nome = button.data('nome');
  const email = button.data('email');
  const modal = $(this);
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #name').val(nome);
  modal.find('.modal-body #email').val(email);
});

$('#deleteUserModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const userId = button.data('user_id');
  const modal = $(this);
  modal.find('.modal-body #user_id').val(userId);
});

const password = document.getElementById('password');
const confirmPassword = document.getElementById('password_confirmation');

function validatePassword() {
  if (password.value !== confirmPassword.value) {
    confirmPassword.setCustomValidity('As palavras-passe não corespondem!');
  } else {
    confirmPassword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirmPassword.onkeyup = validatePassword;
