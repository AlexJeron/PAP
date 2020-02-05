$("#editTurmaModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #nome").val(nome);
});

$("#deleteTurmaModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var turma_id = button.data("turma_id");
    var modal = $(this);
    modal.find(".modal-body #turma_id").val(turma_id);
});
