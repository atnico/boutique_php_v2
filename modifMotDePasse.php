<?php
session_start();


include('functions.php');
include('./head.php');

if (isset($_POST['nom'])) {
    inscription();
}
?>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="moncompte">
                    <h1>Modification du mot de passe</h1>
                </div>
            </div>
        </div>
    </div>
<form action="moncompte.php" method="post" class="editPassword" ng-show="changepassword">
        <input class="small_input" type="password" name="oldPassword" placeholder="Mot de passe actuel" required />
        <input class="small_input" type="password" name="newPassword" placeholder="Nouveau mot de passe" required />
        <input class="small_input" type="password" name="repeatPassword" placeholder="Répétez mot de passe" required />
        <a href="commandes.php"><button class="btn btn-secondary" type="submit">Valider</button></a>
                
</form><br><br>
</body>