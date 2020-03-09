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
  $('.save-event').click(() => {
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

    if (id === '') {
      route = routeEvents('storeAtividade');
    } else {
      route = routeEvents('updateAtividade');
      Event.id = id;
      Event._method = 'PUT';
    }
    console.log({ route, Event });
    sendEvent(route, Event);
  });
});

function resetForm(form) {
  form.reset();
  // document.form_atividade.reset();
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

function openModalAndChangeToDisplayMode() {
  // Show Modal and change its title
  modal.modal('show');
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
  $('select[name=local_select]').attr('disabled', true);
  $('select[name=turmas_select]').attr('disabled', true);
  $('select[name=professores_select]').attr('disabled', true);
  $('select[name=recursos_select]').attr('disabled', true);
  $('.selectpicker').selectpicker('refresh');

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
  inputRecurso.value = recursoNome;
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
  inputRecurso.value = recursoNome;
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
  openModalAndChangeToDisplayMode();
}

function deleteButtonClick() {
  $('#showAtividadeModal').modal('hide');
  $('#deleteAtividadeModal').modal('show');
}
