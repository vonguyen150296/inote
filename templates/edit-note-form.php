<?php
 
$sql_note = "SELECT * FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$get_id'";
 
$data_note = $db->fetch_assoc($sql_note, 1);
 
$date_created = $data_note['date_created'];
    $day_created = substr($date_created, 8, 2); 
    $month_created = substr($date_created, 5, 2);
    $year_created = substr($date_created, 0, 4);
    $hour_created = substr($date_created, 11, 2);
    $min_created = substr($date_created, 14, 2);
 
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Modification du note</h3>
            <div class="alert alert-info">Date créé : 
            <?php
                echo $day_created.'/'.$month_created.'/'.$year_created.' à
                     '.$hour_created.':'.$min_created;
            ?>
            </div>
            <form method="POST" onsubmit="return false;" id="formEditNote">
                <div class="form-group">
                    <label for="user_signin">Sujet</label>
                    <input type="text" class="form-control" id="title_edit_note" value="<?php echo $data_note['title'];  ?>">
                </div>
                <div class="form-group">
                    <label for="pass_signin">Contenu</label>
                    <textarea class="form-control" id="body_edit_note" rows="5"><?php echo $data_note['body'];  ?></textarea>
                </div>
                <input type="hidden" value="<?php echo $data_note['id_note']; ?>" id="id_edit_note">
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Page d'acceuil
                </a>
                <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalDeleteNote">
                    <span class="glyphicon glyphicon-trash"></span> Supprimer
                </button>
                <button class="btn btn-primary" id="submit_edit_note">
                    <span class="glyphicon glyphicon-ok"></span> Enregistrer
                </button>
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>