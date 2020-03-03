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
      $('#showAtividadeModal').modal('show');
      $('#showAtividadeModal .modal-title').text('Consultar Atividade');

      const { title } = element.event;
      $('#showAtividadeModal input[id="name"]').val(title);

      const start = moment(element.event.start).format('YYYY-MM-DDTHH:mm');
      const end = moment(element.event.end).format('YYYY-MM-DDTHH:mm');

      $('#showAtividadeModal input[name="inicio"]').val(start);
      $('#showAtividadeModal input[name="fim"]').val(end);
    },
    // eslint-disable-next-line no-unused-vars
    select: (element) => {
      $('#newAtividadeModal').modal('show');
      $('#newAtividadeModal .modal-title').text('Adicionar Atividade');
    },
    // eslint-disable-next-line no-undef
    events: routeAtividades('loadAtividades'),
  });
  calendar.render();
});
