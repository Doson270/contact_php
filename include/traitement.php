<!-- <?ph
// demarrage de la session
session_start();
// ccreation des differentes variable
$nom = $_POST["nom"] ?? "";
$prenom = $_POST["prenom"] ?? "";
$age = $_POST["age"];
$phone = $_POST["phone"] ?? "";
// creation d'un tableau avec les données
$newenter[
    'nom' => htmlspecialchars($nom),
    'prenom' => htmlspecialchars($prenom),
    "age" => htmlspecialchars($age),
    "phone" => htmlspecialchars($phone),
];
// creation du tableau formulaires 
$_SESSION["formulaires"] = [];
// injection du tableau dans le formulaire 
$_SESSION["formulaires"][] = $newenter;

header('location : ../public/index.php');
exit; -->
