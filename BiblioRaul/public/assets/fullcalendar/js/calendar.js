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
    // eslint-disable-next-line no-unused-vars
    eventClick: (element) => {
      // eslint-disable-next-line no-undef
      $('#showAtividadeModal').modal('show');

      // Change Modal's Title
      const showAtividadeModal = document.getElementById('showAtividadeModal');
      showAtividadeModal.getElementsByClassName('modal-title').text = 'Consultar Atividade';

      // Change Inputs CSS
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
      const { title, id } = element.event;
      const local = element.event.extendedProps.local.nome;
      const recurso = element.event.extendedProps.recurso.nome;
      const start = moment(element.event.start).format('YYYY-MM-DDTHH:mm');
      const end = moment(element.event.end).format('YYYY-MM-DDTHH:mm');
      const {
        totalEspectadores,
        outrosEspectadores,
        turmas,
        professores,
        totalRecursos,
        observacao,
      } = element.event.extendedProps;

      const profNomeArray = [];
      professores.forEach((elem, index) => {
        profNomeArray.push(professores[index].nome);
      });

      const turmaNomeArray = [];
      turmas.forEach((elem, index) => {
        turmaNomeArray.push(turmas[index].nome);
      });

      document.getElementById('id').value = id;
      document.getElementById('name').value = title;
      document.getElementById('local').value = local;
      document.getElementById('nome_recurso').value = recurso;
      document.getElementById('inicio').value = start;
      document.getElementById('fim').value = end;
      document.getElementById('total_espectadores').value = totalEspectadores;
      document.getElementById('outros_espectadores').value = outrosEspectadores;
      document.getElementById('turmas').value = turmaNomeArray.join(', ');
      document.getElementById('professores').value = profNomeArray.join(', ');
      document.getElementById('total_recursos').value = totalRecursos;
      document.getElementById('observacao').value = observacao;
    },
    select: () => {
      // eslint-disable-next-line no-undef
      resetForm(document.getElementById('form_atividade'));

      // Change Modal's Title
      $('#showAtividadeModal').modal('show');
      $('#showAtividadeModal .modal-title').text('Adicionar Atividade');

      // Change Inputs CSS
      const formAtividadeInputs = document.getElementById('form_atividade').getElementsByTagName('input');
      const formAtividadeTextArea = document.getElementById('form_atividade').getElementsByTagName('textarea');

      Array.from(formAtividadeInputs).forEach((el) => {
        el.classList.remove('form-show');
        el.disabled = false;
      });

      Array.from(formAtividadeTextArea).forEach((el) => {
        el.classList.remove('form-show-observacao');
      });

      const colSm1 = document.getElementsByClassName('num-col-sm-1');
      const colSm9 = document.getElementsByClassName('num-col-sm-9');

      Array.from(colSm1).forEach((el) => {
        el.classList.remove('col-sm-1');
        el.classList.add('col-sm-2');
      });

      Array.from(colSm9).forEach((el) => {
        el.classList.remove('col-sm-9');
        el.classList.add('col-sm-8');
      });
    },
    // eslint-disable-next-line no-undef
    events: routeAtividades('loadAtividades'),
  });
  calendar.render();
});
