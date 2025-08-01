
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include '../include/header.php' ?> 
</header>
    <main>
        <form method="POST">
            <label for="text">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="text">Prenom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="number">Age :</label>
            <input type="number" id="age" name="age" required>

            <label for="number">Numero de telephone :</label>
            <input type="number" id="phone" name="phone" required>

            <input type="submit" value="envoyer">
        </form>
        <?php
session_start();
// session_destroy();

// je creer mon tableau session qui va me premettre de sauvegarder mes données 
// avec la condition suivante : si il existe pas creer le mais si il existe ne 
// le creer pas sinon tu va me le supprimer 
if (!isset($_SESSION["contacts"])) {
    $_SESSION["contacts"] = [];
}
// je verifie si ma request a ete envoyé en method post si 
// c'est le cas je vais chercher mes information avec des variables
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST["nom"] ?? "";
    $prenom = $_POST["prenom"] ?? "";  
    $age = $_POST["age"] ?? "";
    $phone = $_POST["phone"] ?? "";
}
// je creer une condition qui me creer un tableau avec mes données
if (!empty($name) && !empty($prenom) && !empty($age) && !empty($phone)) {
    $newcontact = [
        "nom" => $name,
        "prenom" => $prenom,
        "age" => $age,
        "phone" => $phone 
    ];
    }

    // Vérification si le contact existe déjà
    $doublon = false;
    foreach ($_SESSION["contacts"] as $contact) {
        if (
            $contact["nom"] === $newcontact["nom"] &&
            $contact["prenom"] === $newcontact["prenom"] &&
            $contact["phone"] === $newcontact["phone"]
        ) {
            $doublon = true;
            break;
        }
    }
    // On ajoute seulement s’il n’y a pas de doublon
    if (!$doublon) {
        $_SESSION["contacts"][] = $newcontact;
    } else {
        echo "<p style='color:red;'>Ce contact existe déjà !</p>";
    }

   
        ?><h2>historique</h2><?php
        // je creer une boucle avec le tableau de ma session et je rapelle mes contact 
    foreach ($_SESSION["contacts"] as $newcontact) {
         $user = rand(24582, 19999582456);?>
        <div class="historique"> 
            <span><strong>Utilisateur n°</strong><?= $user ?></span>
            <span><strong>Nom : </strong><?= $newcontact["nom"] ?></span>
            <span><strong>Prenom : </strong><?= $newcontact["prenom"] ?></span>
            <span><strong>Age : </strong><?= $newcontact["age"]?></span>
            <span><strong>Numero de telephone : </strong><?= $newcontact["phone"]?></span>
             <?php } ?>
        </div>
    </main>
    <footer>
        <?php include '../include/footer.php'?>
    </footer>
</body>
</html>
<?php