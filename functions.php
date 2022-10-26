
<?php
function getArticles()
{
    return [
        [
            'name' => 'Apple Watch Serie 7',
            'id' => '1',
            'price' => 549.00,
            'description' => 'Design et Performances',
            'detailedDescription' => 'Les Apple Watch Series 7 sont résistantes à l’eau jusqu’à 50 mètres, conformément à la norme ISO 22810:2010. Elles peuvent être utilisées pour des activités en eaux peu profondes telles que la natation en piscine ou en eau libre. La Series 7 a également obtenu l’indice IP6x de protection contre la poussière.',
            'picture' => 'applewatch.png'
        ],
        [
            'name' => 'Samsung Gear S3',
            'id' => '2',
            'price' => 145.00,
            'description' => 'Affiche l\'heure de 250 pays',
            'detailedDescription' => 'Compatible avec les technologies de charge sans-fil, la Samsung Gear S3 dispose avec une charge à induction rapide. Livrée avec son chargeur, il suffit de la déposer sur son socle pour la mettre en charge. Et grâce à la charge rapide, il suffit de 15 minutes de rechargement pour fournir 10h de durée. La batterie 380 mAh offre par ailleurs une autonomie de 3 à 4 jours vous permettant de rester toujours connecté.',
            'picture' => 'samsung.png'
        ],
        [
            'name' => 'Xiaomi S1 GL',
            'id' => '3',
            'price' => 245.00,
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


?>