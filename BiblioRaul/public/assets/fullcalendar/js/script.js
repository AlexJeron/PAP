$(() => {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  });
});

// eslint-disable-next-line no-unused-vars
function sendAtividade(route, data_) {
  $.ajax({
    // headers: {
    //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    // },
    url: route,
    data: data_,
    // eslint-disable-next-line no-undef
    method: 'POST',
    dataType: 'json',
    success: (json) => {
      if (json) {
        window.location.reload();
      }
    },
  });
}

// eslint-disable-next-line no-unused-vars
function routeAtividades(route) {
  return document.getElementById('calendar').dataset[route];
}

function resetForm(form) {
  form.reset();
  // document.form_atividade.reset();
}
