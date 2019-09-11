<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Création un nouveau note</h3>
            <form method="POST" onsubmit="return false;" id="formCreateNote">
                <div class="form-group">
                    <label for="user_signin">Sujet</label>
                    <input type="text" class="form-control" id="title_create_note" />
                </div>
                <div class="form-group">
                    <label for="pass_signin">Contenu</label>
                    <textarea class="form-control" id="body_create_note" rows="5"></textarea>
                </div>
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Page d'accueil
                </a>
                <button class="btn btn-primary" id="submit_create_note">
                    <span class="glyphicon glyphicon-ok"></span> Créer
                </button>
                <br/><br/>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>