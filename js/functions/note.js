//create note
$("#submit_create_note").on("click",function(){
    var title = $("#title_create_note").val();
    var body = $("#body_create_note").val();
    var ac  = "create";
    
    if(title == "" && body == ""){
        $('#formCreateNote .alert').removeClass('hidden');
        $('#formCreateNote .alert').html('Veuillez compléter les informations ci-dessus.');
    }else{
        $.ajax({
            url : "note.php",
            type : "POST",
            data : {
                title : title,
                body : body,
                ac : ac
            },
            success : function(data){
                $('#formCreateNote .alert').removeClass('hidden');
                $('#formCreateNote .alert').html(data);
            }
        })
    }
});

//edit note
$('#submit_edit_note').on('click', function() {
    var title = $('#title_edit_note').val();
    var body = $('#body_edit_note').val();
    var ac = 'edit';
    var id_note = $('#id_edit_note').val();
 
    if (title == '' || title == ''){
        $('#formEditNote .alert').removeClass('hidden');
        $('#formEditNote .alert').html('Veuillez compléter les informations ci-dessus.');
    }else{
        $.ajax({
            url : 'note.php',
            type : 'POST',
            data : {
                title : title,
                body : body,
                ac : ac,
                id_note : id_note
            }, success : function(data) {
                $('#formEditNote .alert').html(data);
            }
        });
    }
});

//delete note

$("#submit_delete_note").on("click",function(){
    var id_note = $("#id_edit_note").val();
    $.ajax({
        url : "note.php",
        type : "POST",
        data : {
            id : id_note,
            ac : "delete"
        },success : function(data) {
            $('#formEditNote .alert').html(data);
        }
    })
});