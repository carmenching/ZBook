$(document).ready(function(e) {

    e.preventDefault();
    $('.addfriend').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $.ajax({
            url: href,
            method: "GET",
            success: function(data) {
                alert('successful');
            }
        });
    });
});