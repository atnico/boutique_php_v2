<?php
session_start();
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
//------ SELECTIONNER ARTICLE -----------------//
if (isset($_POST["chosenArticle"])) {
    $article = getArticleFromId($_POST["chosenArticle"]);
    ajoutArticle($article);
}
//------ MODIFICATION DU NOMBRE D'ARTICLES -----------------//
if (isset($_POST['idArticleModifie'])) {
    modifQuantite();
}

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

    <!----------------- CALCUL FRAIS DE PORT --------------->
    <div class="container container-prix">
        <div class="frais">
            Prix frais de port <?php echo calculerFraisDePort() ?> €
        </div>

        <div class="total">
            Total des achats <?php echo totalPanier() ?> €
        </div>

        <div class="row">
            <div class="totalplusfrais">
                Prix total <?php echo totalGeneral() ?> €
            </div>
        </div>

        <div class="row">
            <div class="validation">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    confirmer l'achat
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Félicitations</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="validation-commande">
                                    <p>Votre commande à été validée</p> </br>
                                </div>
                                <strong>Montant total <?php echo totalGeneral() ?> €</strong> <br><br>
                                Elle sera expédiée le
                                <span class="font-weight-bold">
                                    <?php showShippingDate() ?>
                                </span><br><br>

                                Livraison prévue le
                                <span class="font-weight-bold">
                                    <?php showDeliveryDate() ?>
                                </span><br><br>
                            </div>
                            <div class="modal-footer">

                                <form action="index.php" method="post">
                                    <input type="hidden" name="commandeValidee">
                                    <input class="btn btn-primary mt-2" type="submit" value="Retour a l'accueil">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





















    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>