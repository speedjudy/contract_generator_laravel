$(document).ready(function () {
    var userInfo = JSON.parse(sessionStorage.getItem('user'));
    if (userInfo.user_type==="typeUser") {
        location.href='/';
    }

    //click events
    $("[name=radio1]").click(function () {
        console.log($(this).attr('id'));
        var type = $(this).attr('id');
        $("[name=usertype]").val(type)
        if (type === "typeAdmin") {
            $(".userType").hide();
        } else {
            $(".userType").show();
        }
    });

    // $(".create-user-button").click(function () {

    //     $(".users-form").submit();
    // });

    $(document).on('click', '.view_user', function () {
        var row_id = $(this).parent().parent().attr('rid');
        $.get(
            "users/get_user_info",
            {
                user_id: row_id
            }, function (res) {
                console.log(res);
                var detailed_user_info = res[0];
                $("#detail_name").text(detailed_user_info['name']);
                $("#detail_email").text(detailed_user_info['email']);
                $("#detail_password").text('**********');
                $("#detail_usertype").text(((detailed_user_info['user_type'] === "typeUser") ? "User" : "Administrator"));
                $("#detail_permission").text();
            }, 'json'
        );
    });
    $(document).on('click', '.add_users', function(){
        $("[name=flag]").val('save');
        $(".create-user-button").text('Add User');
        $("#username").val("");
        $("#inputEmail3").val("");
        $("#allow_entries").val("");
    });
    $(document).on('click', '.edit_user', function () {
        var row_id = $(this).parent().parent().attr('rid');
        $("[name=flag]").val('edit');
        $("[name=user_id]").val(row_id);
        $(".create-user-button").text('Update User');
        $.get(
            "users/get_user_info",
            {
                user_id: row_id
            }, function (res) {
                console.log(res);
                var detailed_user_info = res[0];
                $("#username").val(detailed_user_info['name']);
                $("#inputEmail3").val(detailed_user_info['email']);
                if (detailed_user_info['user_type'] === "typeUser") {
                    $('#typeUser').click();
                } else {
                    $('#typeAdmin').click();
                }
                $("#allow_entries").val(detailed_user_info['entry_allow']);
            }, 'json'
        );
    });

    $(document).on('click', '.remove_user', function () {
        var row_id = $(this).parent().parent().attr('rid');
        $.get(
            "users/remove_user",
            {
                user_id: row_id
            }, function (res) {
                location.reload();
            }
        );
    });


    //functions
    function getUsers() {
        $.get(
            "users/get_users",
            {

            }, function (res) {
                var table_data = "";
                for (var i = 0; i < res.length; i++) {
                    table_data += "<tr rid='" + res[i]['id'] + "'>";
                    table_data += "<td>" + (i + 1) + "</td>";
                    table_data += "<td>" + res[i]['name'] + "</td>";
                    table_data += "<td>" + res[i]['email'] + "</td>";
                    table_data += "<td>" + ((res[i]['user_type'] === "typeUser") ? "User" : "Administrator") + "</td>";
                    table_data += "<td></td>";
                    table_data += `<td><button type="button" class="btn btn-xs btn-success view_user" data-toggle="modal" data-target="#modal-user-view">View</button>
                                    <button type="button" class="btn btn-xs btn-primary edit_user" data-toggle="modal" data-target="#modal-users-add">Edit</button>
                                    <button type="button" class="btn btn-xs btn-danger remove_user">Remove</button>
                                    </td>`;
                    table_data += "</tr>";
                }
                $("#users_tbody").html(table_data);
                $("#user_table").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#user_table_wrapper .col-md-6:eq(0)');
                var userAddButton = '<button type="button" class="btn btn-sm btn-primary add_users" data-toggle="modal" data-target="#modal-users-add">Add</button>';
                $("#user_table_filter").append(userAddButton);
            }, 'json'
        );
    }

    getUsers();
});
