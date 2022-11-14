<?php

session_start();
include("functions.php");

//------ SELECTIONNER ARTICLE -----------------//
if (isset($_POST["chosenArticle"])) {
    $article = getArticleFromId($_POST["chosenArticle"]);
    ajoutArticle($article);
}
//------ SUPPRESSION ARTICLE -----------------//
if (isset($_POST['deletedArticle'])) {
    supprimerArticle($_POST['deletedArticle']);
}
//------ SUPPRESSION DES ARTICLES -----------------//
if (isset($_POST['emptyCart'])) {
    emptyCart();
}
//------ MODIFICATION DU NOMBRE D'ARTICLES -----------------//
if (isset($_POST['idArticleModifie'])) {
    modifQuantite();
}






?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
?>

<body>

    <?php
    foreach ($_SESSION['panier'] as $article) {
        echo

        "<div class=\"container container-montres\">
            <div class=\"row row-cols-2 row-cols-lg-5 g-2 g-lg-3 affichage\" width: 5rem;>  
                    <div class=\"col\">
                        <img class=\"card-img\" src=\"images/" . $article['picture'] . "\" alt=\"Card image cap\">
                    </div>
                    <div class=\"col\">
                        <h5 class=\"card-title font-weight-bold\">" . $article['name'] . "</h5>
                    </div>
                    <div class=\"col\">
                        <p class=\"card-text font-italic\">" . $article['description'] . "</p>
                    </div>
                    <div class=\"col\">
                        <p class=\"card-text font-weight-light\">" . $article['price'] . " €</p>
                    </div>
                    <div class=\"col\">
                        <form action=\"panier.php\" method=\"post\">
                            <input type=\"hidden\" name=\"idArticleModifie\" value=\"" . $article['id'] . "\">
                            <label for=\"quantity\">Quantité:</label>
                            <input type=\"number\" id=\"quantity\" name=\"quantity\" min=\"1\" max=\"5\" value=\"" . $article['qte'] . "\">
                            <input type=\"submit\">
                        </form>
                        <form action=\"panier.php\" method=\"post\">
                                <input type=\"hidden\" name=\"deletedArticle\" value=\"" . $article['id'] . "\">
                                <input class=\"btn btn-danger mt-2\" type=\"submit\" value=\"Supprimer l'article\">
                        </form>
                    </div>
            </div>
        </div>";
    }
    ?>

    <!------ MONTANT TOTAL DU PANIER ----------------->

    <?php $total = totalPanier() ?>
    <div class="total"><?php echo totalPanier() ?> €</div>



    <div class="boutons">
        <form action="panier.php" method="post">
            <input type="hidden" name="emptyCart">
            <input class="btn btn-danger mt-2" type="submit" value="Vider le panier">
        </form>
    </div>
    <div class="validation">
        <a href="validation.php"><input type="hidden" name="emptyCart"><button type="button" class="btn btn-dark">valider la commande</button></a>
    </div>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>