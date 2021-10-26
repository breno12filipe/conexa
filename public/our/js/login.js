function loginUser(form){
    $.ajax({
        url: './controller/routes.php',
        method: 'POST',
        contentType: 'application/json',
        async: false,
        data: JSON.stringify({
            operation: 'loginUser',
            email: form[0].value,
            password: form[1].value           
        }),
        success: function(data){
            alert(data)
            $('#login-user-form')[0].reset();
        }
    })
}

