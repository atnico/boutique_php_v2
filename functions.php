
<?php
// ****************** récupérer la liste des articles **********************

function getArticles()
{
    $db = getConnection();
    $query = $db->query('SELECT * FROM articles');
    return $query->fetchAll();
}
// AFFICHAGE DES ARTICLES

function showArticles($articles)
{
    foreach ($articles as $article) {
        echo "<div class=\"card col-md-4 p-3 m-3\" style=\"width: 20rem;\">
                <img class=\"card-img-top\" src=\"images/" . $article['image'] . "\" alt=\"Card image cap\">
                <div class=\"card-body\">
                    <h5 class=\"card-title font-weight-bold\">${article['nom']}</h5>
                    <p class=\"card-text font-italic\">" . $article['description'] . "</p>
                    <p class=\"card-text font-weight-light\">" . $article['prix'] . " €</p>
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
        $totalPanier += $_SESSION['panier'][$i]['qte'] * $_SESSION['panier'][$i]['prix'];
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

function showShippingDate()
{
    // date affichée ainsi : 6 juin 2021
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    $date = date("d-m-Y");
    echo utf8_encode(date("d-m-Y", strtotime($date . " + 1 day")));
}


// ****************** afficher la date de livraison **********************

function showDeliveryDate()
{
    echo utf8_encode(date("d-m-Y", strtotime(date("d-m-Y") . " + 5 days")));
}

// ****************** connexion à la base de données **********************

function getConnection()
{
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC)
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}



// ****************** recuperation des gammes **********************

function recupererGammes()
{
    $db = getConnection();
    $query = $db->query('SELECT * FROM gammes');
    return $query->fetchAll();
}

// ****************** affichage des gammes **********************

function afficherGamme()
{
    $gammes = recupererGammes();
    foreach ($gammes as $gamme) {
        echo '<h2>' . $gamme['nom'] . '</h2>';
        $articlesGamme = getArticlesByRange($gamme['id']);

        echo "<div class=\"container p-5\">
                <div class=\"row text-center justify-content-center\">";
        showArticles($articlesGamme);
        echo "</div>
            </div>";
    }
}

// ****************** récupérer la liste des articles par gamme **********************

function getArticlesByRange($rangeId)
{
    $db = getConnection();
    $query = $db->prepare('SELECT * FROM Articles WHERE id_gamme = :id_gamme');
    $query->execute(array(
        'id_gamme' => $rangeId
    ));
    return $query->fetchAll();
}

// ****************** inscription **********************

function inscription()
{
    $db = getConnection();
    $query = $db->prepare('INSERT INTO clients (nom, prenom, email, mot_de_passe) VALUES(:nom, :prenom, :email, :mot_de_passe)');
    $query->execute([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'mot_de_passe' => $_POST['mot_de_passe']
    ]);
    echo '<script>alert(\'Le compte a bien été créé !\')</script>';
}

function creerUtilisateur()
{

    $db = getConnection();

    if (emptyImputs()) { // vérification des champs vides
        echo "Attention un ou plusieurs champs sont vides!";
    } else {
        if (!verifLongueurChamps()) {  // vérification de la longueur de champs
            echo "Attention longueur d'un ou plusieurs champs incorrecte !";
        } else {

            if (checkEmail($_POST['email'])) {
                echo "Attention email déja utilisé !";
            } else {
                if (!checkPassword($_POST['mot_de_passe'])) {
                    echo "Mots de passe pas assez sûr !";
                } else {
                    // hash du mot de passe

                    $hashedPassword = password_hash(strip_tags($_POST['mot_de_passe']), PASSWORD_DEFAULT);


                    // insertion de l'utilisateur en base de données

                    $query = $db->prepare('INSERT INTO clients (nom, prenom, email, mot_de_passe) VALUES(:nom, :prenom, :email, :mot_de_passe)');
                    $query->execute([
                        'nom' => strip_tags($_POST['nom']),
                        'prenom' => strip_tags($_POST['prenom']),
                        'email' => strip_tags($_POST['email']),
                        'mot_de_passe' => $hashedPassword
                    ]);

                    // Recuperation de l'id

                    $id = $db->lastInsertId();

                    // insertion de l'adresse

                    $query = $db->prepare('INSERT INTO adresses (id_client, adresse, code_postal, ville) VALUES(:id_client, :adresse, :code_postal, :ville)');
                    $query->execute([
                        'id_client' => $id,
                        'adresse' => strip_tags($_POST['adresse']),
                        'code_postal' => strip_tags($_POST['code_postal']),
                        'ville' => strip_tags($_POST['ville'])
                    ]);

                    echo "Le compte a bien été créé";
                }
            }
        }
    }
}


function emptyImputs()
{
    foreach ($_POST as $input) {
        if (empty($input)) {
            return true;
        }
    }

    return false;
}

// ***************** vérifier la longueur des champs ************************

function verifLongueurChamps()
{
    $inputsLenghtOk = true;

    if (strlen($_POST['nom']) > 25 || strlen($_POST['nom']) < 2) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['prenom']) > 25 || strlen($_POST['prenom']) < 2) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['email']) > 25 || strlen($_POST['email']) < 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['addresse']) > 40 || strlen($_POST['addresse']) < 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['code_postal']) !== 5) {
        $inputsLenghtOk = false;
    }

    if (strlen($_POST['ville']) > 25 || strlen($_POST['ville']) < 3) {
        $inputsLenghtOk = false;
    }

    return $inputsLenghtOk;
}

// ***************** vérifier que l'e-mail est déjà utilisé ************************

function checkEmail($email)
{
    $db = getConnection();

    $query = $db->prepare("SELECT * FROM clients WHERE email = ?");
    $user = $query->execute([$email]);

    if ($user) {
        return true;
    } else {
        return false;
    }
}

function checkPassword($password)
{
    // minimum 8 caractères et maximum 15, minimum 1 lettre, 1 chiffre et 1 caractère spécial
    $regex = "^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@$!%*?/&])(?=\S+$).{8,15}$^";
    return preg_match($regex, $password);
}

// ***************** vérifier la connection ************************

function connexion()
{
    $db = getConnection();

    $query = $db->prepare("SELECT * FROM clients WHERE email = ?");
    $query->execute([strip_tags($_POST['email'])]);
    $user = $query->fetch();


    if (!$user) {
        echo "L'utilisateur n'existe pas !";
    } else {
        //vérification si le membre est passé par la page de login :

        if (!isset($_SESSION['Pseudo'])) {

            $msg = 'Désolé, vous devez être identifié pour enregistrer un lieu.';

            // si la variable de session login n'est pas enregistré : retour sur la page index.php

            header('location: index.php?page=index&msg=' . $msg);
        } else { // si tu es bien connecté.

            $Pseudo = $_SESSION['Pseudo'];
        }
    }


    //if (password_verify($_POST['mot_de_passe'], $user['password_hashed'])) {
        if ($_POST['mot_de_passe'] == $user['mot_de_passe']) {
            echo "Accès autorisé !";
            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
        } else {
            echo "Mot de passe erroné !";
        }
    }



// ***************** se déconnecter  ************************

function logOut()
{
    $_SESSION = array();
    echo '<script>alert(\'Vous avez bien été déconnecté !\')</script>';
}
// <?php
//     ini_set('display_errors','on');
//     error_reporting(E_ALL);        
//     require_once 'core/functions.php';

//     $msg = "hhhhh";

//     if(isset($_POST['submitPassword'])){

//         $oldPassword    = $_POST['oldPassword'];
//         $newPassword    = $_POST['newPassword'];
//         $repeatPassword = $_POST['repeatPassword'];

//         $oldPassword = md5($oldPassword);

//         $query = mysql_query("SELECT * FROM users WHERE login='{$_SESSION['login_user']}' AND password='$oldPassword'") or die(mysql_error());
//         $rows = mysql_num_rows($query);

//         if($newPassword != $repeatPassword){
//             echo $msg = "Les nouveaux mots de passe ne sont pas similaires.";
//         }
//         else if($rows == 0) {
//             echo $msg = "L'ancien mot de passe est incorrect";
//         } else {

//             $newPassword = md5($newPassword);

//             mysql_query("UPDATE users SET password='$newPassword' WHERE login='{$_SESSION['login_user']}'");
//             echo $msg = "Votre mot de passe a bien été mis à jour !";
//         }

//     }
?>
