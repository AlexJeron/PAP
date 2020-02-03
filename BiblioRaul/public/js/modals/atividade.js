$("#editAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var inicio = button.data("inicio");
    var fim = button.data("fim");
    var local_id = button.data("local_id");
    var observacao = button.data("observacao");
    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #inicio").val(inicio);
    modal.find(".modal-body #fim").val(fim);
    modal.find(".modal-body #local_id").val(local_id);
    modal.find(".modal-body #observacao").val(observacao);
});

$("#deleteAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var ativ_id = button.data("ativ_id");
    var modal = $(this);
    modal.find(".modal-body #ativ_id").val(ativ_id);
});
