<?php
session_start();
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./head.php');
?>
<body>
    


<?php

$id = $_POST["articleToDisplay"];
$article = getArticleFromId($id);

?>



<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card" style="width: 30rem;">
                <img class="card-img-top" src="images/<?php echo $article['picture']?> "alt="">
                    <div class="card-body">
                        <h1><?php echo $article['name']; ?></h1>
                        <p><?php echo $article["description"]; ?></p>
                        <p><?php echo $article["price"]; ?></p>
                        <p><?php echo $article["detailedDescription"]; ?></p>
                            <a href="panier.php" class="btn btn-primary">Ajouter au panier</a>
                    </div>
            </div>
        </div>
    </div>
</div>
    







<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
