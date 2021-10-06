$( document ).ready(function() {
    
    
})


function getAllTasks(){
    $.get( "listTasks.php", function(tasks) {
        return JSON.parse(tasks);
        
        // tasks = 
        // console.log(tasks)
    })
}