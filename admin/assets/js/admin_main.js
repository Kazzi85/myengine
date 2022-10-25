function delete_user (user_id) {
    $.ajax({
        url: '/admin/Core/del_user.php',
        method: 'post',
        dataType: 'html',
        data: {
            'user_id': user_id,
        },
        success: function(data){
            alert(data);
        }
    });
}
