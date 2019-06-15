$('#message_edit').on('submit', function(e) {
    e.preventDefault();
    var message_editor = $('#message_editor').val()
    var chatWith = $('#chatWith').val();
    $.ajax({
        type: "POST",
        url: 'sendMessage.php',
        data: {
            message_editor: message_editor,
            chatWith: chatWith
        },
        success: function(data) {
            $('#message_sent').append(data);
        }
    })
    return false;

});

$(document).ready(function() {
    $('.link').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "getMessage.php",
            data: { id: this.id },
            dataType: "html",
            success: function(msg) {
                $("#message_sent").html(msg);

            }
        });
    });
});

// Determiner l'utilisateur qu'on parle avec
$(document).ready(function() {
    $('.link').click(function(e) {
        var chatWith = $(this).attr("id");
        $('#chatWith').val(chatWith);
        $('#message_edit').toggle();
    })
})