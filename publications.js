$('#submit_post').on('submit', function(e){
    e.preventDefault();
    var postContent = $('#postContent').val()
    $.ajax({
        type: "POST",
        url: 'publications.php',
        data: {postContent: postContent},
        success: function(data) {
            $('#TIMELINE').html(data);
        }
    })
    // var postForm = $(this),
    // url = postform.attr('action'),
    // type = postform.attr('method'),
    // data = {};
    
    // postForm.find('[name]').each(function(index, value) {
    //     var postContent = $(this),
    //     name = postContent.attr('name'),
    //     value = postContent.val();
    //     data[name] = value;
    // });

    // $.ajax({
    //     url: url,
    //     type: type,
    //     data: data,
    //     success: function(response) {
    //         console.log(response);
    //     }
    // });

    return false;
    
});