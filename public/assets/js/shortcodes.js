$(document).ready(function () {


    //click events
    $(document).on('click', '.add_shortcodes', function(){
        $("[name=flag]").val('save');
        $(".create-shortcode-button").text('Add shortcode');
        $("#shortcodeName").val("");
        var autoGenerator = Math.floor(Math.random()*1000000);
        $("#shortcode").val(autoGenerator);
    });
    $(document).on('click', '.edit_shortcode', function () {
        var row_id = $(this).parent().parent().attr('rid');
        $("[name=flag]").val('edit');
        $("[name=shortcode_id]").val(row_id);
        $(".create-shortcode-button").text('Update shortcode');
        $.get(
            "shortcodes/get_shortcode_info",
            {
                shortcode_id: row_id
            }, function (res) {
                console.log(res);
                var detailed_shortcode_info = res[0];
                $("#shortcodeName").val(detailed_shortcode_info['shortcode_name']);
                $("#shortcode").val(detailed_shortcode_info['shortcode']);
            }, 'json'
        );
    });

    $(document).on('click', '.remove_shortcode', function () {
        var row_id = $(this).parent().parent().attr('rid');
        $.get(
            "shortcodes/remove_shortcode",
            {
                shortcode_id: row_id
            }, function (res) {
                location.reload();
            }
        );
    });

    //functions
    function getshortcodes() {
        $.get(
            "shortcodes/get_shortcodes",
            {

            }, function (res) {
                var table_data = "";
                for (var i = 0; i < res.length; i++) {
                    table_data += "<tr rid='" + res[i]['id'] + "'>";
                    table_data += "<td>" + (i + 1) + "</td>";
                    table_data += "<td>" + res[i]['shortcode_name'] + "</td>";
                    table_data += "<td>" + res[i]['shortcode'] + "</td>";
                    table_data += `<td>
                                    <button type="button" class="btn btn-xs btn-primary edit_shortcode" data-toggle="modal" data-target="#modal-shortcodes-add">Edit</button>
                                    <button type="button" class="btn btn-xs btn-danger remove_shortcode">Remove</button>
                                    </td>`;
                    table_data += "</tr>";
                }
                $("#shortcodes_tbody").html(table_data);
                $("#shortcode_table").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#shortcode_table_wrapper .col-md-6:eq(0)');
                var shortcodeAddButton = '<button type="button" class="btn btn-sm btn-primary add_shortcodes" data-toggle="modal" data-target="#modal-shortcodes-add">Add</button>';
                $("#shortcode_table_filter").append(shortcodeAddButton);
            }, 'json'
        );
    }

    getshortcodes();
});
