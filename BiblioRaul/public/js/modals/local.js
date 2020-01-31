$("#editLocalModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var espaco = button.data("espaco");
    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #nome").val(nome);
    modal.find(".modal-body #espaco").val(espaco);
});

$("#deleteLocalModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var local_id = button.data("local_id");
    var modal = $(this);
    modal.find(".modal-body #local_id").val(local_id);
});
