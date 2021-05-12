$(document).ready(function() {
    
    $('#login').change(function() {
        $.post("login-verify.php",{login: $(this).val() },function(data){
        var str = data.indexOf("Занят");       
            if (str > 0) 
                $('#log').css('color','red').text("Логин занят");
            else
            	
                $('#log').css('color','green').text("Логин свободен");
            	
        })
    });
    
});