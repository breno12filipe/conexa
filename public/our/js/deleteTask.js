function removeTask(cardID){
    if(confirm("Deseja realmente deletar o card?")){
        $.ajax({
            url: '../controller/routes.php',
            type: 'POST',
            contentType: 'application/json',
            async: false,
            data: JSON.stringify({
                operation: 'deleteTask',
                taskID : cardID
            }),
            success: function(data){
                alert(data);
                window.location.reload(true);
            }
        })
    }
}


