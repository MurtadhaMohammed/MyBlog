jQuery(document).ready(function () {

    $(document).on('submit', ".form-commint", function () {
        var user_name = $('#uname').val();
        var user_id = $('#uid').val();
        var num_commint = Number($('#num-commint').html());
        $.ajax({
            type: 'post',
            url: '/commint',
            data: $('.form-commint').serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                $('#num-commint').text(num_commint + 1);
                $('.commint').append('<div class="lead commint-style ' + data.id + '"><div class="pull-left">' + user_name + '</div>' +
                    '<div class="pull-right"><small>' + data.created_at + ' <i class="fa fa-clock-o" aria-hidden="true"></i></small></div><br>' +
                    '<span>' + data.commint + ' </span></div>');
                $('#textarea').val('');

            }
        });
        return false;
    });

    $(document).on('click', "#like", function () {
        var post_id = $('#like').data('post');
        var user_id = $('#like').data('user');
        var num_like = Number($('#like #num-like').html());
        $.ajax({
            type: 'get',
            url: '/like',
            data: { 'like': '1', 'post_id': post_id, 'user_id': user_id },
            beforeSend: function () {

            },
            success: function (data) {
                if (!data.id) {

                    var likes = num_like + 1;
                    $('#like').html('<i style="color:blue" class="fa fa-heart" aria-hidden="true"></i>' +
                        '<span style="color:blue" id="num-like"> ' + likes + '</span>');

                }
            }
        });
        // return false;
    });




    $(document).on('click', "#add-post", function () {

        $.ajax({
            type: 'get',
            url: '../addPost',
            beforeSend: function () {
                $('#posts').html('<img class="col-lg-11 col-centered" src="../img/progress.gif"/>');
            },
            success: function (data) {
                $('#posts').html(data);
            }
        });
    });


    $(document).on('click', "#edit-acount", function () {
        var user_id = $('#edit-acount').data('user');
        $.ajax({
            type: 'get',
            url: '../edit-acount',
            data: { 'user_id': user_id },
            beforeSend: function () {
                $('#posts').html('<img class="col-lg-11 col-centered" src="../img/progress.gif"/>');
            },
            success: function (data) {
                $('#posts').html(data);
            }
        });
    });

    $(document).on('submit', "#edit-form", function () {

        $.ajax({
            type: 'POST',
            url: '../edit-acount',
            data: $('#edit-form').serialize(),
            beforeSend: function () {

            },
            success: function (data) {
                if (data.message === 'Successful') {
                    $('.error-message').css({ 'display': 'none' });
                    $('.success-message').css({ 'display': 'block' });
                    $('.success-message').text(data.message);
                } else {
                    $('.success-message').css({ 'display': 'none' });
                    $('.error-message').css({ 'display': 'block' });
                    $('.error-message').text(data.message);
                }
            }
        });
        return false;
    });


    $(document).on('change', '#url', function (event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#imgselect").fadeIn("slow").attr('src', tmppath);
    });



    // navbar 
    var url = window.location.href;
    a = url.split('/');

    var user = $('.nav li .profile').attr('href');
    b = user.split('/');
    switch (a[a.length - 1]) {
        case '':
            $('.nav li .Home').attr({ 'id': 'active' });
            break;

        case 'register':
            $('.nav li .register').attr({ 'id': 'active' });
            break;

        case b[b.length - 1]:
            $('.nav li .profile').attr({ 'id': 'active' });
            break;

        case 'login':
            $('.nav li .login').attr({ 'id': 'active' });
            break;
    };



    $(document).on('click', '#commint', function () {
        $('html,body').animate({
            scrollTop: $('.form-commint').offset().top
        }, 800);
        $("#textarea").select();

    });


});
