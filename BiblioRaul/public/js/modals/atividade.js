$("#editAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var inicio = button.data("inicio");
    var fim = button.data("fim");
    // var local = button.data("local");
    var local_id = button.data("local_id");
    var observacao = button.data("observacao");
    var professores = button.data("professores");
    var turmas = button.data("turmas");
    // var user = button.data("user");
    var user_id = button.data("user_id");

    // Select Professores
    var profArray = [];
    for (i = 0; i < professores.length; i++) {
        profArray.push(professores[i].id);
    }
    $("#professor_id").selectpicker("val", profArray);

    // Select Turmas
    var turmaArray = [];
    for (i = 0; i < turmas.length; i++) {
        turmaArray.push(turmas[i].id);
    }
    $("#turma").selectpicker("val", turmaArray);

    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #inicio").val(inicio);
    modal.find(".modal-body #fim").val(fim);
    // modal.find(".modal-body #local").val(local);
    modal.find(".modal-body #local_id").val(local_id);
    modal.find(".modal-body #observacao").val(observacao);
    // modal.find(".modal-body #professores").val(profNome);
    // modal.find(".modal-body #turmas").val(turmaNome);
    // modal.find(".modal-body #user").val(user);
    modal.find(".modal-body #user_id").val(user_id);

    document.getElementById("local_id").value = local_id;
    document.getElementById("user_id").value = user_id;
});

$("#deleteAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var ativ_id = button.data("ativ_id");
    var modal = $(this);
    modal.find(".modal-body #ativ_id").val(ativ_id);
});
