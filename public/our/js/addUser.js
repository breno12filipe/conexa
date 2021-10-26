function addUser(form){
    $.ajax({
        url: '../controller/routes.php',
        method: 'POST',
        contentType: 'application/json',
        async: false,
        data: JSON.stringify({
            operation: 'createUser',
            email: form[0].value,
            password: form[1].value,
            password_confirmation: form[2].value
        }),
        success: function(data){
            alert(data)
            $('#add-user-form')[0].reset();
        }
    })
}