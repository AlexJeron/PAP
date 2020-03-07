const modal = $('#showAtividadeModal');

const inputId = document.getElementById('id');
const inputName = document.getElementById('name');
const inputLocal = document.getElementById('local_input');
const inputInicio = document.getElementById('inicio');
const inputFim = document.getElementById('fim');
const inputTotalEspectadores = document.getElementById('total_espectadores');
const inputOutrosEspectadores = document.getElementById('outros_espectadores');
const inputTurmas = document.getElementById('turmas_input');
const inputProfessores = document.getElementById('professores_input');
const inputTotalRecursos = document.getElementById('total_recursos');
const inputRecurso = document.getElementById('recurso_input');
const inputObservacao = document.getElementById('observacao');

const btnCancel = document.getElementById('cancel_atividade');
const btnClose = document.getElementById('close_atividade');
const btnEdit = document.getElementById('edit_atividade');
const btnDelete = document.getElementById('delete_atividade');
const btnSave = document.getElementById('save_atividade');

const formAtividadeInputs = document.getElementById('form_atividade').getElementsByTagName('input');
const formAtividadeTextArea = document.getElementById('form_atividade').getElementsByTagName('textarea');

const colSm1 = document.getElementsByClassName('num-col-sm-1');
const colSm9 = document.getElementsByClassName('num-col-sm-9');

let profNomeArray = [];
let turmaNomeArray = [];

let id;
let title;
let localNome;
let recurso;
let totalEspectadores;
let outrosEspectadores;
let turmas;
let professores;
let totalRecursos;
let observacao;
let start;
let end;

document.addEventListener('DOMContentLoaded', () => {
  const { Calendar } = this.FullCalendar;

  // const { Draggable } = this.FullCalendarInteraction;

  /* initialize the external events
    -----------------------------------------------------------------*/

  // const containerEl = document.getElementById('external-events-list');
  // eslint-disable-next-line no-unused-vars
  // const draggable = new Draggable(containerEl, {
  //   itemSelector: '.fc-event',
  //   eventData: (eventEl) => ({
  //     title: eventEl.innerText.trim(),
  //   }),
  // });

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
    views: {
      week: {
        titleFormat: { year: 'numeric', month: 'long', day: 'numeric' },
      },
    },
    locale: 'pt',
    themeSystem: 'bootstrap',
    // defaultView: 'timeGridWeek',
    allDaySlot: false,
    firstHour: 6,
    selectable: true,
    navLinks: true,
    eventLimit: true,
    editable: true,
    droppable: true,
    contentHeight: 1000,
    eventDurationEditable: false,
    eventDrop: (element) => {
      start = moment(element.event.start).format('YYYY-MM-DD HH:mm:ss');
      // If there's an end date
      if (element.event.end) {
        end = moment(element.event.end).format('YYYY-MM-DD HH:mm:ss');
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
      console.dir(element);

      // Fill Modal's Inputs with Data from the DB
      // const localId = element.event.extendedProps.local.id.toString();
      totalEspectadores = element.event.extendedProps.totalEspectadores;
      outrosEspectadores = element.event.extendedProps.outrosEspectadores;
      turmas = element.event.extendedProps.turmas;
      professores = element.event.extendedProps.professores;
      totalRecursos = element.event.extendedProps.totalRecursos;
      observacao = element.event.extendedProps.observacao;
      id = element.event.id;
      title = element.event.title;
      localNome = element.event.extendedProps.local.nome;
      recurso = element.event.extendedProps.recurso.nome;
      start = moment(element.event.start).format('YYYY-MM-DDTHH:mm');
      end = moment(element.event.end).format('YYYY-MM-DDTHH:mm');

      profNomeArray = [];
      turmaNomeArray = [];

      professores.forEach((elem, index) => {
        profNomeArray.push(professores[index].nome);
      });

      turmas.forEach((elem, index) => {
        turmaNomeArray.push(turmas[index].nome);
      });

      turmaNomeArray = turmaNomeArray.join(', ');
      profNomeArray = profNomeArray.join(', ');

      // eslint-disable-next-line no-undef
      btnEdit.addEventListener('click', () => editButtonClick());
      // eslint-disable-next-line no-undef
      btnCancel.addEventListener('click', () => cancelButtonClick());
      // eslint-disable-next-line no-undef
      changeFormToDisplayMode();
    },
    select: (element) => {
      // eslint-disable-next-line no-undef
      resetForm(document.getElementById('form_atividade'));

      start = moment(element.start).format('YYYY-MM-DDTHH:mm');
      end = moment(element.start).format('YYYY-MM-DDTHH:mm');

      // eslint-disable-next-line no-undef
      changeFormToEditMode();
    },
    // eslint-disable-next-line no-undef
    events: routeAtividades('loadAtividades'),
  });

  calendar.render();
});
