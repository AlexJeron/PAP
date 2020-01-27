// Call the dataTables jQuery plugin
$(document).ready(function() {
    $("#dataTable").DataTable({
        select: true,
        dom: "Bfrtip",
        lengthMenu: [
            [5, 10, 15, -1],
            ["5 Filas", "10 Filas", "15 Filas", "Mostrar tudo"]
        ],
        buttons: [
            { extend: "copy", text: "Copiar" },
            "excel",
            "pdf",
            { extend: "print", text: "Imprimir" },
            "pageLength"
        ],
        colReorder: true
    });
});
