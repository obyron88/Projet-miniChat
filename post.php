<?php
// Insertion du message à l'aide d'une requête préparée
include("connect.php");

$pseudo = $_POST['pseudo'];
$message = $_POST['message'];

// tjr insert into dans l'ordre
$req = $pdo->prepare("INSERT INTO chat (pseudo, message) VALUES (:pseudo, :message)");

$req->execute(array(
    'pseudo' => $pseudo,
    'message' => $message

));


// Redirection du visiteur vers la page du minichat
setcookie('pseudo', $_POST['pseudo'], time() + 24*3600, null, null, false, true);

header('Location: index.php');


?>