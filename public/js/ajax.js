$(document).ready(function () {

    fetch_all_data();

    $(document).on('keypress', '#todo-search', function (e) {
        if (e.which == 13) {
            var query = $(this).val().trim();
            fetch_all_data(query);
        }
    });
});

function fetch_all_data(query) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "home/action",
        method: 'GET',
        data: { query: query },
        dataType: 'json',
        scriptCharset: 'utf-8',
        success: function (data) {
            $('.group-todo').html(data.todo);
            $('.group-done').html(data.done);
            $('.todo-footer').html(data.t_count);
            $('.done-footer').html(data.d_count);
        }
    });
}

$(function () {
    $(document).on('click', '.save-change', function () {
        var title = $('.input-title').val();
        var text = $('textarea').val();

        if (title == '') {
            return;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'ajax/postTodo',
            contentType: "application/json",
            type: 'POST',
            data: JSON.stringify({ 'title': title.trim(), 'text': text.trim() }),
            dataType: "json",
            timeout: 10000,
            cache: false,
            scriptCharset: 'utf-8',
            success: function (data) {
                $('.group-todo').append(data.new_todo);
                $('.todo-footer').html(data.count);
            }
        }).then(
            $('#todolist-modal').modal('hide')
        );
    });
});

$(function () {
    $(document).on('click', '.move-done', function () {
        var done_title = $(this).parents('li').children('h4').text();
        var done_text = $(this).parents('li').children('p').text();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'ajax/done',
            contentType: "application/json",
            type: 'PATCH',
            data: JSON.stringify({ 'title': done_title.trim(), 'text': done_text.trim() }),
            dataType: "json",
            timeout: 10000,
            cache: false,
            scriptCharset: 'utf-8',
            success: function (data) {
                $('.group-done').append(data.done);
                $('.todo-footer').html(data.t_count);
                $('.done-footer').html(data.d_count);
            }
        }).then(
            $(this).parents('li').remove()
        );
    });
});

$(function () {
    $(document).on('click', '.delete-done', function () {
        var del_title = $(this).parents('li').children('h4').text();
        var del_text = $(this).parents('li').children('p').text();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'ajax/delete',
            contentType: "application/json",
            type: 'DELETE',
            data: JSON.stringify({ 'title': del_title.trim(), 'text': del_text.trim() }),
            dataType: "json",
            timeout: 10000,
            cache: false,
            scriptCharset: 'utf-8',
            success: function (data) {
                $('.done-footer').html(data.d_count);
            }
        }).then(
            $(this).parents('li').remove()
        );
    });
});
