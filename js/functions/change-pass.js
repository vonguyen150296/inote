$("#submit_change_pass").on("click",function(){
    var old_pass = $("#old_pass").val();
    var new_pass = $("#new_pass").val();
    var re_pass = $("#re_new_pass").val();

    if(old_pass == "" || new_pass == "" || re_pass == ""){
        $('#formChangePass .alert').removeClass('hidden');
        $('#formChangePass .alert').html('Veuillez compléter les informations ci-dessus.');
    }else if(new_pass != re_pass){
        $('#formChangePass .alert').removeClass('hidden');
        $('#formChangePass .alert').html('les 2 nouveaux mot de passe ne sont pas pareil.');
    }else{
        $.ajax({
            url : "change-pass.php",
            type : "POST",
            data : {
                old_pass : old_pass,
                new_pass : new_pass
            },success: function(data){
                $('#formChangePass .alert').removeClass('hidden');
                $('#formChangePass .alert').html(data);
            }
        });
    }
});