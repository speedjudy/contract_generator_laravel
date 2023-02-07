$(document).ready(function () {

    $("#template_table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#template_table_wrapper .col-md-6:eq(0)');
    var templateAddButton = '<button type="button" class="btn btn-sm btn-primary add_templates" data-toggle="modal" data-target="#modal-templates-add">Add</button>';
    $("#template_table_filter").append(templateAddButton);

    $(".add_templates").click(function(){
        $(".signature-pad").attr('width', 736);
        $(".signature-pad").attr('height', 230);
    });
});
