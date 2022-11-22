<?php
session_start();
include("functions.php");
creationPanier()
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
if (isset($_POST['commandeValidee'])) {
    emptyCart();
}
?>
<!-- <body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="moncompte">
                    <h1>Modifier mes informations</h1>
                </div>
            </div>
        </div>
    </div>
    <form action="connection.php" method="post">
        <div class="row g-3">
            <div class="col-md-3">
                <label for="validationDefault01" class="form-label"></label>
                <input name="nom" type="text" class="form-control" id="validationDefault01" value="Nom" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault02" class="form-label"></label>
                <input name="prenom" type="text" class="form-control" id="validationDefault02" value="Prenom" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault02" class="form-label"></label>
                <input name="adresse" type="text" class="form-control" id="validationDefault02" value="Adresse" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault02" class="form-label"></label>
                <input name="code_postal" type="text" class="form-control" id="validationDefault02" value="Code postal" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault02" class="form-label"></label>
                <input name="ville" type="text" class="form-control" id="validationDefault02" value="Ville" required>
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="Email" required>
                    
                </div>
            </div>
        </div>
        <div class="row g-3">
        </div>
        <div class="row g-3"><br>
            <div class="col-md-2">
                <div class="form-group">
                <label for="exampleInputPassword1"></label>
                <input name="mot_de_passe" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
    </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">
                        J'accepte les conditions d'utilisation
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Valider</button>
            </div>
        </div>
    </form>
</body> -->

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="moncompte">
                    <h1>Modifier mes informations</h1>
                </div>
            </div>
        </div>
    </div>
    <form action="connection.php" method="post">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="validationDefault01" class="form-label"></label>
                            <input name="nom" type="text" class="form-control" id="validationDefault01" value="Nom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault02" class="form-label"></label>
                            <input name="prenom" type="text" class="form-control" id="validationDefault02" value="Prenom" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <label for="exampleInputEmail1" class="form-label"></label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="Email" required>
                        </div>
                    </div>
                    <div class="btn">
                        <a href="monCompte.php" class="btn btn-secondary">Valider</a>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mx-auto">
                    <a href="profil.php"><button class="btn btn-secondary" type="submit">Modifier mes informations</button></a>
                </div>
                <div class="col-md-3 mx-auto">
                    <a href="modifMotDePasse.php"><button class="btn btn-secondary" type="submit">Modifier mon mot de passe</button></a>
                </div>
                <div class="col-md-3 mx-auto">
                    <a href="commandes.php"><button class="btn btn-secondary" type="submit">Voir mes commandes</button></a>
                </div>
            </div>
        </div> -->
    </form>
</body>