function editTask(form, cardID){
    

    /*
        subject
        start-date
        due-date
        task-priority
        task-status
        select-user
    */
    

    $.ajax({
        url: '../controller/routes.php',
        type: 'POST',
        contentType: 'application/json',
        async: false,
        data: JSON.stringify({
            operation: 'updateTask',
            id : cardID,
            subject: form[0].value,
            start_date : form[1].value,
            due_date : form[2].value,
            priority : form[3].value,
            status : form[4].value,
            selected_user : form[5].value
        }),
        success: function(data){
            alert(data);
            window.location.reload(true);
        }
    })

}