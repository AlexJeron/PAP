// eslint-disable-next-line no-unused-vars
function routeAtividades(route) {
  return document.getElementById('calendar').dataset[route];
}

$(() => {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  });
});

function sendAtividade(route, data_) {
  $.ajax({
    url: route,
    data: data_,
    // eslint-disable-next-line no-undef
    method: POST,
    dataType: 'json',
    success: (json) => {
      if (json) {
        window.location.reload();
      }
    },
  });
}
