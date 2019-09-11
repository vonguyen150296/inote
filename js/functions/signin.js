$("#submit_signin").on("click", function(){
    var username = $("#user_signin").val();
    var pass = $("#pass_signin").val();

    if(username == "" || pass == ""){
        $('#formSignin .alert').removeClass('hidden');
        $('#formSignin .alert').html('Veuillez compléter les informations ci-dessus.');
    }else{
        $.ajax({
            url : "signin.php",
            type : "POST",
            data : {
                user : username,
                pass : pass
            },
            success: function(data){
                $('#formSignin .alert').html(data);
            }
        })
    }
});