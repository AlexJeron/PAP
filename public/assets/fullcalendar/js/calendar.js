/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */
const modal = $('#masterAtividadeModal');
const form = document.getElementById('form');

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

const formAtividadeInputs = form.getElementsByTagName('input');
const formAtividadeTextArea = form.getElementsByTagName('textarea');

const colSm1 = document.getElementsByClassName('num-col-sm-1');
const colSm9 = document.getElementsByClassName('num-col-sm-9');

let profIdArray = [];
let profNomeArray = [];
let turmaIdArray = [];
let turmaNomeArray = [];

let route;
let id;
let title;
let localId;
let localNome;
let localSelect;
let totalEspectadores;
let outrosEspectadores;
let turmas;
let turmasSelect;
let professores;
let professoresSelect;
let totalRecursos;
let recursoId;
let recursoNome;
let recursoSelect;
let observacao;
let start;
let end;

document.addEventListener('DOMContentLoaded', () => {
  const { Calendar } = this.FullCalendar;

  // Initialize the calendar
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
    // contentHeight: 100,
    height: $(window).height() * 0.83,
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
        sendEvent(routeEvents('updateAtividade'), newAtividade);
        // If there's no end date
      } else {
        const newAtividade = {
          _method: 'PUT',
          id: element.event.id,
          start,
        };
        sendEvent(routeEvents('updateAtividade'), newAtividade);
      }
    },
    eventClick: (element) => {
      console.dir(element);

      // Fill Modal's Inputs with Data from the DB
      totalEspectadores = element.event.extendedProps.total_espectadores;
      outrosEspectadores = element.event.extendedProps.outros_espectadores;
      turmas = element.event.extendedProps.turmas;
      professores = element.event.extendedProps.professores;
      totalRecursos = element.event.extendedProps.total_recursos;
      observacao = element.event.extendedProps.observacao;
      id = element.event.id;
      title = element.event.title;
      localId = element.event.extendedProps.local.id;
      localNome = element.event.extendedProps.local.nome;
      if (element.event.extendedProps.recurso !== null) {
        recursoId = element.event.extendedProps.recurso.id;
        recursoNome = element.event.extendedProps.recurso.nome;
      }
      start = moment(element.event.start).format('YYYY-MM-DDTHH:mm');
      end = moment(element.event.end).format('YYYY-MM-DDTHH:mm');

      profIdArray = [];
      profNomeArray = [];
      turmaIdArray = [];
      turmaNomeArray = [];

      professores.forEach((elem, index) => {
        profIdArray.push(professores[index].id);
        profNomeArray.push(professores[index].nome);
      });

      turmas.forEach((elem, index) => {
        turmaIdArray.push(turmas[index].id);
        turmaNomeArray.push(turmas[index].nome);
      });

      turmaNomeArray = turmaNomeArray.join(', ');
      profNomeArray = profNomeArray.join(', ');

      btnEdit.addEventListener('click', () => editButtonClick());
      btnCancel.addEventListener('click', () => cancelButtonClick());
      modal.modal('show');
      changeModalToDisplayMode();
    },
    select: (element) => {
      id = '';
      start = moment(element.start).format('YYYY-MM-DDTHH:mm');
      end = moment(element.start).format('YYYY-MM-DDTHH:mm');

      modal.modal('show');
      changeModalToEditMode();
      formReset(form);
      errorClear();
    },
    events: routeEvents('loadAtividades'),
  });

  calendar.render();
});
