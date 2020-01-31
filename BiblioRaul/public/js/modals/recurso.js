$("#editRecursoModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var quantidade = button.data("quantidade");
    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #quantidade").val(quantidade);
});

$("#deleteRecursoModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var recurso_id = button.data("recurso_id");
    var modal = $(this);
    modal.find(".modal-body #recurso_id").val(recurso_id);
});
