$("#editUserModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var email = button.data("email");
    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #email").val(email);
});

$("#deleteUserModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var user_id = button.data("user_id");
    var modal = $(this);
    modal.find(".modal-body #user_id").val(user_id);
});
