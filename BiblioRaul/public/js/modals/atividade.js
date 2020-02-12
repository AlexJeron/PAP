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
    var profIdArray = [];
    for (i = 0; i < professores.length; i++) {
        profIdArray.push(professores[i].id);
    }
    $("#professor_id").selectpicker("val", profIdArray);

    // Select Turmas
    var turmaIdArray = [];
    for (i = 0; i < turmas.length; i++) {
        turmaIdArray.push(turmas[i].id);
    }
    $("#turmas").selectpicker("val", turmaIdArray);

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

$("#showAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var inicio = button.data("inicio");
    var fim = button.data("fim");
    var local_nome = button.data("local_nome");
    var recurso_nome = button.data("recurso_nome");
    var num_recursos = button.data("num_recursos");
    var total_espectadores = button.data("total_espectadores");
    var outros_espectadores = button.data("outros_espectadores");
    var professores = button.data("professores");
    var turmas = button.data("turmas");
    var observacao = button.data("observacao");
    var user_name = button.data("user_name");

    // Select Local
    $("select[name=local_nome]").val(local_nome);
    $(".selectpicker").selectpicker("refresh");

    // Select User
    $("select[name=user_name]").val(user_name);
    $(".selectpicker").selectpicker("refresh");

    // Select Recurso
    $("select[name=recurso_id]").val(recurso_id);
    $(".selectpicker").selectpicker("refresh");

    // Select e Input (show) Professores
    var profIdArray = [];
    var profNomeArray = [];

    for (i = 0; i < professores.length; i++) {
        profIdArray.push(professores[i].id);
    }

    for (i = 0; i < professores.length; i++) {
        profNomeArray.push(professores[i].nome);
    }

    $("#show_professor_id").selectpicker("val", profIdArray);
    $("#show_professor_id").val(profNomeArray.join(", "));

    // Select e Input (show) Turmas
    var turmaIdArray = [];
    var turmaNomeArray = [];

    for (i = 0; i < turmas.length; i++) {
        turmaIdArray.push(turmas[i].id);
    }

    for (i = 0; i < turmas.length; i++) {
        turmaNomeArray.push(turmas[i].nome);
    }

    $("#show_turmas").selectpicker("val", turmaIdArray);
    $("#show_turmas").val(turmaNomeArray.join(", "));

    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #inicio").val(inicio);
    modal.find(".modal-body #fim").val(fim);
    modal.find(".modal-body #local_nome").val(local_nome);
    modal.find(".modal-body #recurso_nome").val(recurso_nome);
    modal.find(".modal-body #num_recursos").val(num_recursos);
    modal.find(".modal-body #show_observacao").val(observacao);
    modal.find(".modal-body #total_espectadores").val(total_espectadores);
    modal.find(".modal-body #outros_espectadores").val(outros_espectadores);
    modal.find(".modal-body #user_name").val(user_name);

    document.getElementById("local_nome").value = local_nome;
    if (recurso_nome != undefined) {
        document.getElementById("recurso_nome").value = recurso_nome;
    } else {
        document.getElementById("recurso_nome").value = "Nenhum recurso";
    }
    document.getElementById("user_name").value = user_name;
});

$("#deleteAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var ativ_id = button.data("ativ_id");
    var modal = $(this);
    modal.find(".modal-body #ativ_id").val(ativ_id);
});

$("#clearNewSelectTurmas").click(function() {
    $("#new_turmas").val("default");
    $("#new_turmas").selectpicker("refresh");
});

$("#clearNewSelectProfessores").click(function() {
    $("#new_professores").val("default");
    $("#new_professores").selectpicker("refresh");
});

$("#clearNewSelectRecursos").click(function() {
    $("#new_recurso_id").val("default");
    $("#new_num_recursos").val("default");
    $("#new_recurso_id").selectpicker("refresh");
});

$("#clearEditSelectTurmas").click(function() {
    $("#turmas").val("default");
    $("#turmas").selectpicker("refresh");
});

$("#clearEditSelectProfessores").click(function() {
    $("#professor_id").val("default");
    $("#professor_id").selectpicker("refresh");
});

$("#clearEditSelectRecursos").click(function() {
    $("#recurso_id").val("default");
    $(".num_recursos").val("default");
    $("#recurso_id").selectpicker("refresh");
});
