$("#editProfessorModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var nome = button.data("nome");
    var email = button.data("email");
    var id = button.data("id");
    var modal = $(this);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #email").val(email);
    modal.find(".modal-body #id").val(id);
});

$("#deleteProfessorModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var prof_id = button.data("prof_id");
    var modal = $(this);
    modal.find(".modal-body #prof_id").val(prof_id);
});
