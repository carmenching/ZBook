$('#userSearch').on('submit', function(e) {
    e.preventDefault();
    var searchUserName = $('#searchUserName').val()
    $.ajax({
        type: "POST",
        url: 'searchList.php',
        data: { searchUserName: searchUserName },
        success: function(data) {
            $('#userList').prepend(data);
        }
    })
});