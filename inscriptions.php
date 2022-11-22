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


<div class="card col-md-8 mx-auto">
    <div class="card-body">
        <form action="connection.php" method="post">
            <div class="row g-3">
                <div class="col-md-6">
                    <input name="prenom" type="text" class="form-control" placeholder="prenom" aria-label="prenom" required>
                </div>
                <div class="col-md-6">
                    <input name="nom" type="text" class="form-control" placeholder="nom" aria-label="nom" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label"></label>
                    <input name="email" type="email" class="form-control" id="email" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label"></label>
                    <input name="mot_de_passe" type="password" class="form-control" id="mot_de_passe" placeholder="Mot de passe" required>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="inputAddress" class="form-label"></label>
                    <input name="adresse" type="text" class="form-control" id="adresse" placeholder="Numero, rue" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="inputCity" class="form-label"></label>
                    <input name="ville" type="text" class="form-control" id="ville" placeholder="ville" required>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label"></label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label"></label>
                <input name="code_postal" type="text" class="form-control" id="code_postal" placeholder="Code postal" required>
            </div><br>
            

             <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Se souvenir de moi
                    </label>
                </div>
            </div><br>
            <div class="col-12 mx-auto">
                <a href="index.php"><button type="submit" class="btn btn-secondary">Sign in</button></a>
            </div>
        </form>
    </div>
</div>



<!----<h1>Insérer des données dans une table avec PDO</h1>