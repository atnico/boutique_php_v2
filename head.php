<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f1b49c94fc.js" crossorigin="anonymous"></script>
    <!-- STYLE -->
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Boutique de montres</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gammes.php">Gammes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="panier.php">Panier</a>
                        </li>

                        <?php if (isset($_SESSION['id'])) //--- Si l'utilisateur est connecté
                        {
                            echo
                            "<li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"monCompte.php\">Mon compte</i></a>
                    </li>
                    <li class=\"nav-item\">
                    <form action=\"index.php\" method=\"post\">
                        <input name=\"deconnexion\" type=\"submit\" value=\"deconnexion\">
                    </form>
                    </li>";
                        } else {
                            echo
                            "<li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"connection.php\">Connection/Inscription</a>
                    </li>";
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
    </nav>

</body>