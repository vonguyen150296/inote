$("#submit_signup").on("click",function(){
    //get data from form
    var user = $("#user_signup").val();
    var pass = $("#pass_signup").val();
    var repass = $("#repass_signup").val();

    //show the notification error
    if(user == "" && pass == "" && repass == ""){
        $("#formSignup .alert").removeClass("hidden");
        $("#formSignup .alert").html("Veuillez saisir les informations");
    }else{
        if(pass != repass){
            $("#formSignup .alert").removeClass("hidden");
            $("#formSignup .alert").html("Mot de passe n\'est pas correspondant avec mot de passe à noveau!");
        }else{
            $.ajax({
                url : "signup.php",
                type : "POST",
                data : {
                    user_signup : user,
                    pass_signup : pass,
                    repass_signup : repass
                },
                success : function (data){
                    $('#formSignup .alert').html(data);
                }
            });
        }
    }
});