<?php
session_start();


include('functions.php');
include('./head.php');

if (isset($_POST['nom'])) {
    inscription();
}
?>


<body>
    <form action="connection.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="moncompte">
                        <h1>Modification de l'adresse</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto">
            <div class="card">

                <div class="card-body">
                    <div class="col-md-12 mx-auto">
                        <label for="inputAddress" class="form-label"></label>
                        <input name="adresse" type="text" class="form-control" id="inputAddress" placeholder="Numero, rue">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <label for="validationDefault02" class="form-label"></label>
                            <input name="code_postal" type="text" class="form-control" id="validationDefault02" value="Code postal" required>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <label for="validationDefault02" class="form-label"></label>
                            <input name="ville" type="text" class="form-control" id="validationDefault02" value="Ville" required>
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
        </div>
    </form>
</body>