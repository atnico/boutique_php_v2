<?php
session_start();
include("functions.php");
creationPanier()
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
if (isset($_POST['commandeValidee'])){
    emptyCart();
}
?>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="moncompte">
                    <h1>Mes commandes</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mx-auto">
        <button class="btn btn-secondary" type="submit">Retour au compte</button>
    </div>
</body>