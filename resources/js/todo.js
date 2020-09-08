$(document).ready(function($){

    //----- Open model CREATE -----//
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
        console.log("Message click");
    });

    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        // Data from form inputs
        let formData = {
            title: $('#title').val(),
            description: $('#description').val(),
        };

        let state = $('#btn-save').val();
        let type = "POST";
        let todo_id = $('#todo_id').val();
        let ajaxurl = 'todo';

        // Ajax Post
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log("success", data)
                let todo = '<tr id="todo' + data.id + '">' +
                               '<td>' + data.id + '</td>' +
                               '<td>' + data.title + '</td>' +
                               '<td>' + data.description + '</td>'+
                                '<td><button class="btn btn-primary edit-modal" value="' + data.id + '">Edit</button>&nbsp;'+
                                '<button class="btn btn-danger delete-todo" value="' + data.id + '">Delete</button></td>' +
                            '</tr>';
                /*let todo = '<tr id="todo' + data.id + '">' +
                               '<td>' + data.id + '</td>' +
                               '<td>' + data.title + '</td>' +
                               '<td>' + data.description + '</td>'
                                todo += '<td><button class="btn btn-primary edit-modal" value="' + data.id + '">Edit</button>&nbsp;'
                                todo += '<button class="btn btn-danger delete-todo" value="' + data.id + '">Delete</button></td>' +
                            '</tr>';*/

                if (state === "add") {
                    $('#todo-list').append(todo);
                } else {
                    $("#todo" + todo_id).replaceWith(todo);
                }
                $('#myForm').trigger("reset");
                $('#formModal').modal('hide')
            },
            error: function (data) {
                console.log(data);
            }
        });


        //Ajax Get
        $.ajax({
            type: 'GET',
            url: ajaxurl,
            success: function(data){
                console.log("Welcome to the list", data.title);
            },
        });
    });
});
