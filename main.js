    $(function() {
        $('#messagerie form').submit(function() {
            var auteur = $('#messagerie #auteur').val();
            var corps = $('#messagerie #corps').val();
            $.ajax({
                type: "POST",
                url: "Testajax.php",
                data: 'auteur=' + auteur + '&corps=' + corps,
                success: function(data) {
                    $('#messages').prepend(data);
                    $('#nopost').hide();
                }
            });
            return false;
        });
    });
