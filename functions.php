
<?php
function getArticles()
{
    return [
        [
            'name' => 'Apple Watch Serie 7',
            'id' => '1',
            'price' => 549.99,
            'description' => 'Design et Performances',
            'detailedDescription' => 'Les Apple Watch Series 7 sont résistantes à l’eau jusqu’à 50 mètres, conformément à la norme ISO 22810:2010. Elles peuvent être utilisées pour des activités en eaux peu profondes telles que la natation en piscine ou en eau libre. La Series 7 a également obtenu l’indice IP6x de protection contre la poussière.',
            'picture' => 'applewatch.jpeg',
        ],
        [
            'name' => 'Samsung Gear S3',
            'id' => '2',
            'price' => 145.99,
            'description' => 'Affiche l\'heure de 250 pays',
            'detailedDescription' => 'Compatible avec les technologies de charge sans-fil, la Samsung Gear S3 dispose avec une charge à induction rapide. Livrée avec son chargeur, il suffit de la déposer sur son socle pour la mettre en charge. Et grâce à la charge rapide, il suffit de 15 minutes de rechargement pour fournir 10h de durée. La batterie 380 mAh offre par ailleurs une autonomie de 3 à 4 jours vous permettant de rester toujours connecté.',
            'picture' => 'samsunggear.jpeg'
        ],
        [
            'name' => 'Xiaomi S1 GL',
            'id' => '3',
            'price' => 245.99,
            'description' => 'La classe à l\'état pur',
            'detailedDescription' => 'La montre connectée Xiaomi Watch S1 Active, itération de la Xiaomi Watch S1 arbore un design différent et plus orientée sport. Elle possède un écran AMOLED circulaire de 1.43 pouces avec une compatibilité Always-on display. Équipée de nombreuses caractéristiques, notamment le choix entre 117 modes de sport, la détection automatique de certaines activités ainsi que des capteurs pour le suivi de santé.',
            'picture' => 'xiaomiwatch.png'
        ]
    ];
}
// AFFICHAGE DES ARTICLES

function showArticles()
{
    $articles = getArticles();
    foreach ($articles as $article) {
        echo "<div class=\"card col-md-5 col-lg-3 p-3 m-3\" style=\"width: 18rem;\">
                <img class=\"card-img-top\" src=\"images/" . $article['picture'] . "\" alt=\"Card image cap\">
                <div class=\"card-body\">
                    <h5 class=\"card-title font-weight-bold\">${article['name']}</h5>
                    <p class=\"card-text font-italic\">" . $article['description'] . "</p>
                    <p class=\"card-text font-weight-light\">" . $article['price'] . " €</p>
                    <form action=\"product.php\" method=\"post\">
                        <input type=\"hidden\" name=\"articleToDisplay\" value=\"" . $article['id'] . "\">
                        <input class=\"btn btn-light\" type=\"submit\" value=\"Détails produit\">
                    </form>
                    <form action=\"panier.php\" method=\"post\">
                        <input type=\"hidden\" name=\"chosenArticle\" value=\"" . $article['id'] . "\">
                        <input class=\"btn btn-dark mt-2\" type=\"submit\" value=\"Ajouter au panier\">
                    </form>
                </div>
            </div>";
    }
}

function getArticleFromId($id)
{
    $articles = getArticles();
    foreach ($articles as $article) {
        if ($id == $article["id"]) {
            return $article;
        }
    }
}

//-------------------------- FONCTIONS PANIER --------------------------------//

function creationPanier()
{
    if (!isset($_SESSION["panier"])) {
        $_SESSION["panier"] = array();
    }
}

function ajoutArticle($article)
{


    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($article["id"] == $_SESSION["panier"][$i]["id"]) {
            echo "<script> alert(\"Article déjà présent dans le panier !\");</script>";
            return;
        }
    }
    $article["qte"] = 1;
    array_push($_SESSION["panier"], $article);
}


function supprimerArticle($id)
{


    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {
        if ($_SESSION["panier"][$i]["id"] == $id) {
            array_splice($_SESSION["panier"], $i, 1);
            echo "<script> alert(\"Article supprimé !\");</script>";
            return;
        }
    }
}
//------ vider le panier -----------------//
function emptyCart()
{
    $_SESSION['panier'] = [];
    echo "<script> alert(\"Le panier a bien été vidé !\");</script>";
}

//------ MODIFICATION NOMBRE D'ARTICLES -----------------//

function modifQuantite()
{

    for ($i = 0; $i < count($_SESSION["panier"]); $i++) {

        if ($_SESSION['panier'][$i]['id'] == $_POST['idArticleModifie']) {
            $_SESSION['panier'][$i]['qte'] = $_POST['quantity'];
        }
    }
}

function totalPanier()
{

    $totalPanier = 0;

    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        $totalPanier += $_SESSION['panier'][$i]['qte'] * $_SESSION['panier'][$i]['price'];
    }

    return $totalPanier;
}

//------ FRAIS DE PORT -----------------//

function calculerFraisDePort()
{
    $qteTotale = 0;

    foreach ($_SESSION['panier'] as $article) {
        $qteTotale += $article['qte'];
    }

    return $qteTotale * 3;
}

function totalGeneral()
{
    return calculerFraisDePort() + totalPanier();


}

// ****************** afficher la date d'expédition **********************

function showShippingDate(){
    // date affichée ainsi : 6 juin 2021
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    $date = date("d-m-Y");
    echo utf8_encode(date("d-m-Y", strtotime($date . " + 1 day")));
}


// ****************** afficher la date de livraison **********************

function showDeliveryDate(){
    echo utf8_encode(date("d-m-Y", strtotime(date("d-m-Y") . " + 5 days")));
}



?>