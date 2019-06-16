$(document).ready(function() {
    $('#searchUserName').keyup(function() {
        var searchUserName = $(this).val();
        if (searchUserName != '') {
            $.ajax({
                url: "searchList.php",
                method: "POST",
                data: { searchUserName: searchUserName },
                success: function(data) {
                    $('#usersList').removeClass("hiddenwithouthover");
                    $('#usersList').html(data);
                    console.log(data);
                }
            });
            return false;
        }
    });
});