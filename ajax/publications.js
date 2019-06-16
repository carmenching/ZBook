// envoyer le post à la bdd et afficher le dernier post
$('#submit_post').on('submit', function(e) {
    e.preventDefault();
    var postContent = $('#postContent').val()
    console.log(postContent);
    if (postContent !== '') {
        $.ajax({
            type: "POST",
            url: 'publications.php',
            data: { postContent: postContent },
            success: function(data) {
                $('#TIMELINE').prepend(data);
            }
        })
    }
    return false;

});