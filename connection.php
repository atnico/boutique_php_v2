<?php
session_start();


include('functions.php');
include('./head.php');

if (isset($_POST['nom'])) {
    inscription();
}
?>


    <div class="card col-md-6 mx-auto">
        <div class="card-body">
            <form action="index.php" method="post">
                <div class="container container-form">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input name="mot_de_passe" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                    </div>
                    <a href="index.php"><button type="submit" class="btn btn-primary">Valider</button></a>

                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12 mx-auto">
        <div class="insciptions-titre">
            <h2>Pas encore inscrit ?</h2>
        </div>
        <div class="btn-inscription">
            <a href="inscriptions.php"><button type="submit" class="btn btn-primary">Inscrivez-vous</button></a>
        </div>
    </div>


<?php
