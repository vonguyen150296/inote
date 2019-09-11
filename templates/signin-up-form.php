<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3 class="text-primary">La connexion</h3>
            <form method="POST" onsubmit="return false;" id="formSignin">
                <div class="alert alert-danger hidden"></div>
                <div class="form-group">
                    <label for="user_signin">Utilisateur</label>
                    <input type="text" class="form-control" id="user_signin">
                </div>
                <div class="form-group">
                    <label for="pass_signin">Mot de passe</label>
                    <input type="password" class="form-control" id="pass_signin">
                </div>
                <button class="btn btn-primary" id="submit_signin">Se connecter</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <h3 class="text-success">L'enregistrement</h3>
            <p class="text-danger">* Veuillez saisir les informations suivantes pour créer un compte:</p>
            <form method="POST" onsubmit="return false;" id="formSignup">
                <div class="alert alert-danger hidden"></div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Utilisateur" id="user_signup">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mot de passe" id="pass_signup">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Entrer mot de passe à nouveau" id="repass_signup">
                </div>
                <button class="btn btn-success" id="submit_signup">Créer</button>
                <br><br>
            </form>
        </div>
    </div>
</div>