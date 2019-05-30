$('#submit_post').on('submit', function(e){
    e.preventDefault();
    var postContent = $('#postContent').val()
    $.ajax({
        type: "POST",
        url: 'publications.php',
        data: {postContent: postContent},
        success: function(data) {
            $('#TIMELINE').prepend(data);
        }
    })
    return false;
    
});