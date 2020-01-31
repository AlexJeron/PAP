$("#editRecursoModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var quantidade_total = button.data("quantidade_total");
    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #quantidade_total").val(quantidade_total);
});

$("#deleteRecursoModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var recurso_id = button.data("recurso_id");
    var modal = $(this);
    modal.find(".modal-body #recurso_id").val(recurso_id);
});
