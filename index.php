<?php
session_start();
include("functions.php");
creationPanier()
?>
<!DOCTYPE html>
<html lang="en">
<?php

if (isset($_POST['commandeValidee'])){
    emptyCart();
}

if (isset($_POST['email'])){
    connexion();
}

if (isset($_POST['deconnexion'])){
    logOut();
}
include('./head.php');
?>






<body>

    

    <?php
    $articles = getArticles();
    ?>

    <!-- CARTES MONTRES -->
    <section id="mes-montres">
        <div class="container">
            <div class="row mx-auto">
                <?php showArticles($articles);?>
            </div>
        </div>
    </section>










    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>