<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Liste des notes</h3>
            <div class="list-group">
                <?php
                $sql_note = "SELECT * FROM notes WHERE user_id ='".$data_user["id_user"]."' ORDER BY id_note DESC";
 
                if ($db->num_rows($sql_note)){
                    foreach ($db->fetch_assoc($sql_note, 0) as $key => $data_list_note) {
                        $date_created = $data_list_note['date_created'];
                            $day_created = substr($date_created, 8, 2);
                            $month_created = substr($date_created, 5, 2);
                            $year_created = substr($date_created, 0, 4);
                            $hour_created = substr($date_created, 11, 2);
                            $min_created = substr($date_created, 14, 2);
 
                        //réduction le grand contenu
                        if (strlen($data_list_note['body']) > 300){
                            $data_list_note['body'] = substr($data_list_note['body'], 0, 300).' ...';
                        }else{
                            $data_list_note['body'] = $data_list_note['body'];
                        }
 
                        echo '
                            <a href="index.php?ac=edit_note&&id='.$data_list_note['id_note'].'" class="list-group-item ">
                                <h4 class="list-group-item-heading">'.$data_list_note['title'].'</h4>
                                <p class="list-group-item-text">'.$data_list_note['body'].'</p>
                                <small> créé le 
                                    '.$day_created.'/'.$month_created.'/'.$year_created.' à '.$hour_created.':'.$min_created.'
                                </small>
                             </a>         
                        ';
                    }                                               
                }else{
                    echo '
                        <div class="alert alert-info">Il n\'y a rien de note.</div>
                    ';
                }
 
                ?>
            </div>
        </div>
    </div>
</div>