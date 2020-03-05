document.addEventListener('DOMContentLoaded', () => {
  const { Calendar } = this.FullCalendar;
  const { Draggable } = this.FullCalendarInteraction;

  /* initialize the external events
    -----------------------------------------------------------------*/

  const containerEl = document.getElementById('external-events-list');
  // eslint-disable-next-line no-unused-vars
  const draggable = new Draggable(containerEl, {
    itemSelector: '.fc-event',
    eventData: (eventEl) => ({
      title: eventEl.innerText.trim(),
    }),
  });

  // the individual way to do it
  // let containerEl = document.getElementById('external-events-list');
  // let eventEls = Array.prototype.slice.call(
  //   containerEl.querySelectorAll('.fc-event')
  // );
  // eventEls.forEach(function(eventEl) {
  //   new Draggable(eventEl, {
  //     eventData: {
  //       title: eventEl.innerText.trim(),
  //     }
  //   });
  // });

  /* initialize the calendar
    -----------------------------------------------------------------*/

  const calendarEl = document.getElementById('calendar');
  const calendar = new Calendar(calendarEl, {
    plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
    },
    locale: 'pt',
    themeSystem: 'bootstrap',
    // defaultView: 'timeGridWeek',
    selectable: true,
    navLinks: true,
    eventLimit: true,
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar
    eventDurationEditable: false,
    drop: (arg) => {
      // is the "remove after drop" checkbox checked?
      if (document.getElementById('drop-remove').checked) {
        // if so, remove the element from the "Draggable Events" list
        arg.draggedEl.parentNode.removeChild(arg.draggedEl);
      }
    },
    eventDrop: (element) => {
      const start = moment(element.event.start).format('YYYY-MM-DD HH:mm:ss');
      // If there's an end date
      if (element.event.end) {
        const end = moment(element.event.end).format('YYYY-MM-DD HH:mm:ss');
        const newAtividade = {
          _method: 'PUT',
          id: element.event.id,
          start,
          end,
        };
        // eslint-disable-next-line no-undef
        sendAtividade(routeAtividades('updateAtividade'), newAtividade);
        // If there's no end date
      } else {
        const newAtividade = {
          _method: 'PUT',
          id: element.event.id,
          start,
        };
        // eslint-disable-next-line no-undef
        sendAtividade(routeAtividades('updateAtividade'), newAtividade);
      }
    },
    eventClick: (element) => {
      // Show Modal and change its title
      const modal = $('#showAtividadeModal');
      modal.modal('show');
      modal.find('.modal-title').text('Consultar Atividade');

      // Change Inputs' CSS
      const formAtividadeInputs = document.getElementById('form_atividade').getElementsByTagName('input');
      const formAtividadeTextArea = document.getElementById('form_atividade').getElementsByTagName('textarea');

      const colSm1 = document.getElementsByClassName('num-col-sm-1');
      const colSm9 = document.getElementsByClassName('num-col-sm-9');

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

      console.dir(element);

      // Fill Modal's Inputs with Data from the DB
      const {
        totalEspectadores,
        outrosEspectadores,
        turmas,
        professores,
        totalRecursos,
        observacao,
      } = element.event.extendedProps;
      const { title, id } = element.event;
      const localId = element.event.extendedProps.local.id.toString();
      const localNome = element.event.extendedProps.local.nome;
      const recurso = element.event.extendedProps.recurso.nome;
      const start = moment(element.event.start).format('YYYY-MM-DDTHH:mm');
      const end = moment(element.event.end).format('YYYY-MM-DDTHH:mm');

      // Form Inputs
      const inputId = document.getElementById('id');
      const inputName = document.getElementById('name');
      const inputInicio = document.getElementById('inicio');
      const inputFim = document.getElementById('fim');
      const inputTotalEspectadores = document.getElementById('total_espectadores');
      const inputOutrosEspectadores = document.getElementById('outros_espectadores');
      const inputTurmas = document.getElementById('turmas_input');
      const inputProfessores = document.getElementById('professores');
      const inputTotalRecursos = document.getElementById('total_recursos');
      const inputNomeRecurso = document.getElementById('nome_recurso');
      const inputObservacao = document.getElementById('observacao');
      const btnEdit = document.getElementById('edit_atividade');
      const btnDelete = document.getElementById('delete_atividade');

      // Bootstrap-selects
      $('select[name=local_select]').val(localId);
      $('select[name=local_select]').attr('disabled', true);
      $('.selectpicker').selectpicker('refresh');

      let profNomeArray = [];
      let turmaNomeArray = [];

      btnEdit.hidden = false;
      btnDelete.hidden = false;

      professores.forEach((elem, index) => {
        profNomeArray.push(professores[index].nome);
      });

      turmas.forEach((elem, index) => {
        turmaNomeArray.push(turmas[index].nome);
      });

      turmaNomeArray = turmaNomeArray.join(', ');
      profNomeArray = profNomeArray.join(', ');

      // Hide selects and show inactive inputs
      const localInput = document.getElementById('local_input');

      localInput.type = 'text';
      localInput.value = localNome;
      localInput.disabled = true;

      inputTurmas.type = 'text';
      inputTurmas.value = turmaNomeArray;
      inputTurmas.disabled = true;
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
      inputNomeRecurso.value = recurso;
      inputObservacao.value = observacao;

      inputName.disabled = true;
      inputInicio.disabled = true;
      inputFim.disabled = true;
      inputTotalEspectadores.disabled = true;
      inputOutrosEspectadores.disabled = true;
      inputTurmas.disabled = true;
      inputProfessores.disabled = true;
      inputTotalRecursos.disabled = true;
      inputNomeRecurso.disabled = true;
      inputObservacao.disabled = true;
    },
    select: () => {
      // eslint-disable-next-line no-undef
      resetForm(document.getElementById('form_atividade'));

      // Show Modal and change its title
      const modal = $('#showAtividadeModal');
      modal.modal('show');
      modal.find('.modal-title').text('Adicionar Atividade');

      // Change Inputs CSS
      const formAtividadeInputs = document.getElementById('form_atividade').getElementsByTagName('input');
      const formAtividadeTextArea = document.getElementById('form_atividade').getElementsByTagName('textarea');
      const btnEdit = document.getElementById('edit_atividade');
      const btnDelete = document.getElementById('delete_atividade');
      const colSm1 = document.getElementsByClassName('num-col-sm-1');
      const colSm9 = document.getElementsByClassName('num-col-sm-9');

      // Form Inputs
      const inputName = document.getElementById('name');
      const inputInicio = document.getElementById('inicio');
      const inputFim = document.getElementById('fim');
      const inputTotalEspectadores = document.getElementById('total_espectadores');
      const inputOutrosEspectadores = document.getElementById('outros_espectadores');
      const inputTurmas = document.getElementById('turmas_input');
      const inputProfessores = document.getElementById('professores');
      const inputTotalRecursos = document.getElementById('total_recursos');
      const inputNomeRecurso = document.getElementById('nome_recurso');
      const inputObservacao = document.getElementById('observacao');

      btnEdit.hidden = true;
      btnDelete.hidden = true;

      // Bootstrap-selects
      $('select[name=local_select]').val('');
      $('select[name=local_select]').removeAttr('disabled');
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
      inputNomeRecurso.disabled = false;
      inputObservacao.disabled = false;

      // Hide inputs and show selects
      const localInput = document.getElementById('local_input');
      const turmasInput = document.getElementById('turmas_input');

      localInput.type = 'hidden';
      localInput.value = '';

      turmasInput.type = 'hidden';
      turmasInput.value = '';

      $('.select-picker-div').removeClass('d-none');
    },
    // eslint-disable-next-line no-undef
    events: routeAtividades('loadAtividades'),
  });
  calendar.render();
});
