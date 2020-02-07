$("#editAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var inicio = button.data("inicio");
    var fim = button.data("fim");
    var local_id = button.data("local_id");
    var recurso_id = button.data("recurso_id");
    var num_recursos = button.data("num_recursos");
    var total_espectadores = button.data("total_espectadores");
    var outros_espectadores = button.data("outros_espectadores");
    var professores = button.data("professores");
    var turmas = button.data("turmas");
    var observacao = button.data("observacao");
    var user_name = button.data("user_name");

    // Select Local
    $("select[name=local_id]").val(local_id);
    $(".selectpicker").selectpicker("refresh");

    // Select User
    $("select[name=user_name]").val(user_name);
    $(".selectpicker").selectpicker("refresh");

    // Select Recurso
    $("select[name=recurso_id]").val(recurso_id);
    $(".selectpicker").selectpicker("refresh");

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
    $("#turmas").selectpicker("val", turmaArray);

    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #inicio").val(inicio);
    modal.find(".modal-body #fim").val(fim);
    modal.find(".modal-body #local_id").val(local_id);
    modal.find(".modal-body #recurso_id").val(recurso_id);
    modal.find(".modal-body #num_recursos").val(num_recursos);
    modal.find(".modal-body #observacao").val(observacao);
    modal.find(".modal-body #total_espectadores").val(total_espectadores);
    modal.find(".modal-body #outros_espectadores").val(outros_espectadores);
    modal.find(".modal-body #user_name").val(user_name);

    document.getElementById("local_id").value = local_id;
    document.getElementById("recurso_id").value = recurso_id;
    document.getElementById("user_name").value = user_name;
});

$("#deleteAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var ativ_id = button.data("ativ_id");
    var modal = $(this);
    modal.find(".modal-body #ativ_id").val(ativ_id);
});
