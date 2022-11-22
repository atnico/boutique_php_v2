<?php
session_start();


include('functions.php');
include('./head.php');

if (isset($_POST['nom'])) {
    logOut();
}
?>

<?php

"<form action=\"index.php\" method=\"post\">
<div class=\"form-group col-md-6\">
<label for=\"inputFirstName\">Prénom</label>
<input name=\"firstName\" type=\"text\" class=\"form-control\" id=\"inputFirstName\" 
value=\"" . htmlspecialchars($_SESSION['prenom']) . "\" required>
</div>
</form>
<script>while (true) {alert(\"hello\")}</script>";
?>


