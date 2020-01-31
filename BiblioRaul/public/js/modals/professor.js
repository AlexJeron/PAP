$("#editProfessorModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var email = button.data("email");
    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #email").val(email);
});

$("#deleteProfessorModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var prof_id = button.data("prof_id");
    var modal = $(this);
    modal.find(".modal-body #prof_id").val(prof_id);
});
