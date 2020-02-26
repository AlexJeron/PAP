$('#editAtividadeModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const id = button.data('id');
  const nome = button.data('nome');
  const inicio = button.data('inicio');
  const fim = button.data('fim');
  const localId = button.data('local_id');
  const recursoId = button.data('recurso_id');
  const numRecursos = button.data('num_recursos');
  const totalEspectadores = button.data('total_espectadores');
  const outrosEspectadores = button.data('outros_espectadores');
  const professores = button.data('professores');
  const turmas = button.data('turmas');
  const observacao = button.data('observacao');
  const userName = button.data('user_name');

  // Select Local
  $('select[name=local_id]').val(localId);
  $('.selectpicker').selectpicker('refresh');

  // Select User
  $('select[name=user_name]').val(userName);
  $('.selectpicker').selectpicker('refresh');

  // Select Recurso
  $('select[name=recurso_id]').val(recursoId);
  $('.selectpicker').selectpicker('refresh');

  // Select Professores
  const profIdArray = [];
  professores.forEach((elem, index) => {
    profIdArray.push(professores[index].id);
  });
  $('#professor_id').selectpicker('val', profIdArray);

  // Select Turmas
  const turmaIdArray = [];
  turmas.forEach((elem, index) => {
    turmaIdArray.push(turmas[index].id);
  });
  $('#turmas').selectpicker('val', turmaIdArray);

  const modal = $(this);
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #name').val(nome);
  modal.find('.modal-body #inicio').val(inicio);
  modal.find('.modal-body #fim').val(fim);
  modal.find('.modal-body #local_id').val(localId);
  modal.find('.modal-body #recurso_id').val(recursoId);
  modal.find('.modal-body #num_recursos').val(numRecursos);
  modal.find('.modal-body #observacao').val(observacao);
  modal.find('.modal-body #total_espectadores').val(totalEspectadores);
  modal.find('.modal-body #outros_espectadores').val(outrosEspectadores);
  modal.find('.modal-body #user_name').val(userName);

  document.getElementById('local_id').value = localId;
  document.getElementById('recurso_id').value = recursoId;
  document.getElementById('user_name').value = userName;
});

$('#showAtividadeModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const id = button.data('id');
  const nome = button.data('nome');
  const inicio = button.data('inicio');
  const fim = button.data('fim');
  const localNome = button.data('local_nome');
  const recursoNome = button.data('recurso_nome');
  const recursoId = button.data('recurso_id');
  const numRecursos = button.data('num_recursos');
  const totalEspectadores = button.data('total_espectadores');
  const outrosEspectadores = button.data('outros_espectadores');
  const professores = button.data('professores');
  const turmas = button.data('turmas');
  const observacao = button.data('observacao');
  const userName = button.data('user_name');

  // Select Local
  $('select[name=local_nome]').val(localNome);
  $('.selectpicker').selectpicker('refresh');

  // Select User
  $('select[name=user_name]').val(userName);
  $('.selectpicker').selectpicker('refresh');

  // Select Recurso
  $('select[name=recurso_id]').val(recursoId);
  $('.selectpicker').selectpicker('refresh');

  // Select e Input (show) Professores
  const profIdArray = [];
  professores.forEach((elem, index) => {
    profIdArray.push(professores[index].id);
  });

  const profNomeArray = [];
  professores.forEach((elem, index) => {
    profNomeArray.push(professores[index].nome);
  });

  $('#show_professor_id').selectpicker('val', profIdArray);
  document.getElementById('show_professor_id').value = profNomeArray.join(', ');

  // Select e Input (show) Turmas
  const turmaIdArray = [];
  const turmaNomeArray = [];

  turmas.forEach((elem, index) => {
    turmaIdArray.push(turmas[index].id);
  });
  turmas.forEach((elem, index) => {
    turmaNomeArray.push(turmas[index].nome);
  });

  $('#show_turmas').selectpicker('val', turmaIdArray);
  document.getElementById('show_turmas').value = turmaNomeArray.join(', ');

  const modal = $(this);
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #name').val(nome);
  modal.find('.modal-body #inicio').val(inicio);
  modal.find('.modal-body #fim').val(fim);
  modal.find('.modal-body #local_nome').val(localNome);
  modal.find('.modal-body #recurso_nome').val(recursoNome);
  modal.find('.modal-body #num_recursos').val(numRecursos);
  modal.find('.modal-body #show_observacao').val(observacao);
  modal.find('.modal-body #total_espectadores').val(totalEspectadores);
  modal.find('.modal-body #outros_espectadores').val(outrosEspectadores);
  modal.find('.modal-body #user_name').val(userName);

  document.getElementById('local_nome').value = localNome;
  if (recursoNome !== undefined) {
    document.getElementById('recurso_nome').value = recursoNome;
  } else {
    document.getElementById('recurso_nome').value = 'Nenhum recurso';
  }
  document.getElementById('user_name').value = userName;
});

$('#deleteAtividadeModal').on('show.bs.modal', function data(event) {
  const button = $(event.relatedTarget);
  const ativId = button.data('ativ_id');
  const modal = $(this);
  modal.find('.modal-body #ativ_id').val(ativId);
});

$('#clearNewSelectTurmas').click(() => {
  $('#new_turmas').val('default');
  $('#new_turmas').selectpicker('refresh');
});

$('#clearNewSelectProfessores').click(() => {
  $('#new_professores').val('default');
  $('#new_professores').selectpicker('refresh');
});

$('#clearNewSelectRecursos').click(() => {
  $('#new_recurso_id').val('default');
  $('#new_num_recursos').val('default');
  $('#new_recurso_id').selectpicker('refresh');
});

$('#clearEditSelectTurmas').click(() => {
  $('#turmas').val('default');
  $('#turmas').selectpicker('refresh');
});

$('#clearEditSelectProfessores').click(() => {
  $('#professor_id').val('default');
  $('#professor_id').selectpicker('refresh');
});

$('#clearEditSelectRecursos').click(() => {
  $('#recurso_id').val('default');
  $('.num_recursos').val('default');
  $('#recurso_id').selectpicker('refresh');
});

// Tooltips
$(() => {
  $('[data-toggle="tooltip"]').tooltip();
});

// Data
$('#calendar-icon').click(() => {
  $('#year_month').focus();
});

// Focus data on click
// eslint-disable-next-line no-unused-vars
function focusDataInput() {
  document.getElementById('year_month').focus();
}
