$("#editAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var nome = button.data("nome");
    var inicio = button.data("inicio");
    var fim = button.data("fim");
    var local = button.data("local");
    var local_id = button.data("local_id");
    var observacao = button.data("observacao");
    var professores = button.data("professores");
    var user = button.data("user");
    var user_id = button.data("user_id");

    // Table Professores
    var profNome;
    var profTable = document.getElementById("profTable");
    profTable.classList.add("table");
    profTable.classList.add("table-bordered");
    for (i = 0; i < professores.length; i++) {
        // console.log(professores[i].nome);
        profNome = professores[i].nome;
        profTable.insertRow(i).innerHTML = profNome;
    }
    var profTableHeader = profTable.createTHead();
    var profTableHeaderRow = profTableHeader.insertRow(0);
    var profTableHeaderCell = profTableHeaderRow.insertCell(0);
    profTableHeaderCell.innerHTML = "Professores";
    profTableHeader.style = "font-weight:bold";
    // professores.forEach(nome => console.log(nome));
    // console.log(Object.values(professores));
    // console.log(professores[0].nome);

    var modal = $(this);
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #name").val(nome);
    modal.find(".modal-body #inicio").val(inicio);
    modal.find(".modal-body #fim").val(fim);
    modal.find(".modal-body #local").val(local);
    modal.find(".modal-body #local_id").val(local_id);
    modal.find(".modal-body #observacao").val(observacao);
    modal.find(".modal-body #professores").val(profNome);
    modal.find(".modal-body #user").val(user);
    modal.find(".modal-body #user_id").val(user_id);

    document.getElementById("local").value = local_id;
    document.getElementById("user").value = user_id;
});

$("#editAtividadeModal").on("hide.bs.modal", function() {
    profTable.innerHTML = "";
});

$("#deleteAtividadeModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var ativ_id = button.data("ativ_id");
    var modal = $(this);
    modal.find(".modal-body #ativ_id").val(ativ_id);
});
