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
                        <h1>Mon compte</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="moncompte-icones">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mx-auto">
                        <i class="fa-solid fa-user fa-5x"></i><br>
                        <a href="profil.php"><button type="button" class="btn btn-secondary">Modififier mes informations</button></a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <i class="fa-solid fa-key fa-5x"></i>
                        <a href="modifMotDePasse.php"><button type="button" class="btn btn-secondary">Modififier mon mot de passe</button></a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <i class="fa-solid fa-house fa-5x"></i><br>
                        <a href="modifAdresse.php"><button type="button" class="btn btn-secondary">Modififier mon adresse</button></a>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <i class="fa-solid fa-clipboard-list fa-5x"></i><br>
                        <a href="commandes.php"><button type="button" class="btn btn-secondary">Voir mes commandes</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>