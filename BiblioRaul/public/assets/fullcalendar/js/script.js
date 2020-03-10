/* eslint-disable no-underscore-dangle */
/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */

function routeEvents(route) {
  return document.getElementById('calendar').dataset[route];
}

function sendEvent(route, data_) {
  $.ajax({
    url: route,
    data: data_,
    method: 'POST',
    dataType: 'json',
    success: (json) => {
      if (json) {
        window.location.reload();
      }
    },
  });
}

$(() => {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  });
});

function errorClear() {
  inputName.classList.remove('is-invalid');
  document.getElementById('invalid_name').style.display = 'none';

  document.querySelector('[data-id="local_select"]').style.borderColor = '#d1d3e288';
  document.getElementById('invalid_local').style.display = 'none';

  inputInicio.classList.remove('is-invalid');
  document.getElementById('invalid_start').style.display = 'none';

  inputTotalEspectadores.classList.remove('is-invalid');
  document.getElementById('invalid_total').style.display = 'none';
}

function formValidation() {
  if (inputName.value === '') {
    inputName.classList.add('is-invalid');
    document.getElementById('invalid_name').style.display = 'block';
  }

  if (localSelect.value === '') {
    document.querySelector('[data-id="local_select"]').style.borderColor = 'red';
    document.getElementById('invalid_local').style.display = 'block';
  }

  if (inputInicio.value === '') {
    inputInicio.classList.add('is-invalid');
    document.getElementById('invalid_start').style.display = 'block';
  }

  if (inputTotalEspectadores.value === '') {
    inputTotalEspectadores.classList.add('is-invalid');
    document.getElementById('invalid_total').style.display = 'block';
  }
}

$('.save-event').click((event) => {
  event.preventDefault();
  localSelect = document.getElementById('local_select');
  turmasSelect = $('#turmas_select').val();
  professoresSelect = $('#professores_select').val();
  recursoSelect = document.getElementById('recurso_select');
  // console.log({ localSelect, turmasSelect, professoresSelect, recursoSelect });

  const Event = {
    title: inputName.value,
    local_id: localSelect.value,
    start: inputInicio.value,
    end: inputFim.value,
    total_espectadores: inputTotalEspectadores.value,
    outros_espectadores: inputOutrosEspectadores.value,
    turmas: turmasSelect,
    professores: professoresSelect,
    total_recursos: inputTotalRecursos.value,
    recurso_id: recursoSelect.value,
    observacao: inputObservacao.value,
  };

  if (id) {
    route = routeEvents('updateAtividade');
    Event.id = id;
    Event._method = 'PUT';
  } else {
    route = routeEvents('storeAtividade');
  }

  formValidation();

  if (inputName.value && localSelect.value && inputTotalEspectadores.value) {
    sendEvent(route, Event);
    $('#masterAtividadeModal').modal('hide');
  }
});

function resetForm(form) {
  form.reset();
  $('.selectpicker').selectpicker('val', '');
}

function editButtonClick() {
  modal.find('.modal-title').text('Editar Atividade');

  // Change Form's CSS
  btnClose.hidden = true;
  btnCancel.hidden = false;
  btnDelete.hidden = true;
  btnEdit.hidden = true;
  btnSave.hidden = false;

  Array.from(formAtividadeInputs).forEach((el) => {
    el.classList.remove('form-show');
    el.disabled = false;
  });

  Array.from(formAtividadeTextArea).forEach((el) => {
    el.classList.remove('form-show-observacao');
    el.disabled = false;
  });

  Array.from(colSm1).forEach((el) => {
    el.classList.add('col-sm-2');
    el.classList.remove('col-sm-1');
  });

  Array.from(colSm9).forEach((el) => {
    el.classList.add('col-sm-8');
    el.classList.remove('col-sm-9');
  });
}

function changeModalToDisplayMode() {
  modal.find('.modal-title').text('Consultar Atividade');

  // Change Inputs' CSS to a cleaner display mode
  Array.from(formAtividadeInputs).forEach((el) => {
    el.classList.add('form-show');
  });

  Array.from(formAtividadeTextArea).forEach((el) => {
    el.classList.add('form-show-observacao');
  });

  Array.from(colSm1).forEach((el) => {
    el.classList.remove('col-sm-2');
    el.classList.add('col-sm-1');
  });

  Array.from(colSm9).forEach((el) => {
    el.classList.remove('col-sm-8');
    el.classList.add('col-sm-9');
  });

  // ! Bootstrap-selects
  //  $('select[name=local_select]').val(localId);
  // $('select[name=local_select]').attr('disabled', true);
  // $('select[name=turmas_select]').attr('disabled', true);
  // $('select[name=professores_select]').attr('disabled', true);
  // $('select[name=recursos_select]').attr('disabled', true);
  // $('.selectpicker').selectpicker('refresh');

  document.querySelectorAll('span.red').forEach((e) => {
    e.style.display = 'none';
  });
  document.getElementById('outros_espectadores').placeholder = 'Sem outros possíveis espectadores';

  btnClose.hidden = false;
  btnCancel.hidden = true;
  btnEdit.hidden = false;
  btnDelete.hidden = false;
  btnSave.hidden = true;

  // Hide selects and show inactive inputs
  inputLocal.type = 'text';
  inputLocal.value = localNome;
  inputLocal.disabled = true;

  inputTurmas.type = 'text';
  inputTurmas.value = turmaNomeArray;
  inputTurmas.disabled = true;

  inputProfessores.type = 'text';
  inputProfessores.value = profNomeArray;
  inputProfessores.disabled = true;

  inputRecurso.type = 'text';
  if (recursoNome !== undefined) {
    inputRecurso.value = recursoNome;
  }
  inputRecurso.disabled = true;

  $('.select-picker-div').addClass('d-none');

  inputId.value = id;
  inputName.value = title;
  inputInicio.value = start;
  inputFim.value = end;
  inputTotalEspectadores.value = totalEspectadores;
  inputOutrosEspectadores.value = outrosEspectadores;
  inputTurmas.value = turmaNomeArray;
  inputProfessores.value = profNomeArray;
  inputTotalRecursos.value = totalRecursos;
  if (recursoNome !== undefined) {
    inputRecurso.value = recursoNome;
  }
  inputObservacao.value = observacao;

  inputName.disabled = true;
  inputInicio.disabled = true;
  inputFim.disabled = true;
  inputTotalEspectadores.disabled = true;
  inputOutrosEspectadores.disabled = true;
  inputTurmas.disabled = true;
  inputProfessores.disabled = true;
  inputTotalRecursos.disabled = true;
  inputRecurso.disabled = true;
  inputObservacao.disabled = true;
}

function changeModalToEditMode() {
  // Show Modal and change its title
  modal.find('.modal-title').text('Adicionar Atividade');

  // Change Inputs layout
  document.querySelectorAll('span.red').forEach((e) => {
    e.style.display = 'inline';
  });
  document.getElementById('outros_espectadores').placeholder = 'Tipo de espectadores (ex: Alunos) [Campo Opcional]';

  btnClose.hidden = false;
  btnCancel.hidden = true;
  btnEdit.hidden = true;
  btnSave.hidden = false;
  btnDelete.hidden = true;

  // Bootstrap-selects
  $('select[name=local_select]').val(localId);
  $('select[name=local_select]').removeAttr('disabled');

  $('#turmas_select').selectpicker('val', turmaIdArray);
  $('select[name=turmas_select]').removeAttr('disabled');

  $('#professores_select').selectpicker('val', profIdArray);
  $('select[name=professores_select]').removeAttr('disabled');

  $('select[name=recurso_select]').val(recursoId);
  $('select[name=recurso_select]').removeAttr('disabled');

  $('.selectpicker').selectpicker('refresh');

  Array.from(formAtividadeInputs).forEach((el) => {
    el.classList.remove('form-show');
    el.disabled = false;
  });

  Array.from(formAtividadeTextArea).forEach((el) => {
    el.classList.remove('form-show-observacao');
  });

  Array.from(colSm1).forEach((el) => {
    el.classList.remove('col-sm-1');
    el.classList.add('col-sm-2');
  });

  Array.from(colSm9).forEach((el) => {
    el.classList.remove('col-sm-9');
    el.classList.add('col-sm-8');
  });

  inputName.disabled = false;
  inputInicio.disabled = false;
  inputFim.disabled = false;
  inputTotalEspectadores.disabled = false;
  inputOutrosEspectadores.disabled = false;
  inputTurmas.disabled = false;
  inputProfessores.disabled = false;
  inputTotalRecursos.disabled = false;
  inputRecurso.disabled = false;
  inputObservacao.disabled = false;

  // Hide inputs and show selects
  inputLocal.type = 'hidden';
  inputLocal.value = '';

  inputTurmas.type = 'hidden';
  inputTurmas.value = '';

  inputProfessores.type = 'hidden';
  inputProfessores.value = '';

  inputRecurso.type = 'hidden';
  inputRecurso.value = '';

  $('.select-picker-div').removeClass('d-none');

  inputInicio.value = start;
  inputFim.value = end;
}

function cancelButtonClick() {
  changeModalToDisplayMode();
}

function deleteButtonClick() {
  $('#masterAtividadeModal').modal('hide');
  $('#deleteAtividadeModal').modal('show');
}

$('#deleteAtividadeModal').on('hide.bs.modal', () => {
  $('#masterAtividadeModal').modal('show');
});
