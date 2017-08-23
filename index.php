<?php
// Connexion à la base de données
include("connect.php");

$pseudocookie = $_COOKIE['pseudo'];
?>
<!DOCTYPE>
<html>

<head>
    <title>MiniChat Project II - The Return</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Material Design Light -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
</head>

<body>
    <div class="mdl-layout mdl-js-layout">
        <main class="mdl-layout__content">
            <div class="page-content">
                <ul class="demo-list-item mdl-list" id="conversation">
<?php

$retour = $pdo->query('SELECT COUNT(*) AS nbmessage FROM chat');

$retour2 = $retour->fetchAll();

foreach ($retour2 as $value) {

    echo '<p>Nombre de messages : '.$value->nbmessage.'</p>';
}
$nombreMessages = $value->nbmessage;
$nombreDeMessagesParPage = 10;
$nombreDePages = ceil($nombreMessages / $nombreDeMessagesParPage);
echo 'Page : ';
for ($i = 1 ; $i <= $nombreDePages ; $i++)
{
    echo '<a href="index.php?page=' . $i . '"><button>' . $i . '</button></a> ';
}
if (isset($_GET['page']))
{
    $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse
}
else // La variable n'existe pas, c'est la première fois qu'on charge la page
{
    $page = 1; // On se met sur la page 1 (par défaut)
}
// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;

// Récupération des 10 derniers messages
$reponse2 = $pdo->query('SELECT pseudo, message FROM chat ORDER BY ID DESC LIMIT ' . $premierMessageAafficher . ', ' . $nombreDeMessagesParPage);

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

$reponse3 = $reponse2->fetchAll();

foreach ($reponse3 as $value) {

    $value->message = str_replace(':smile_cat:','<img style="width: 30px; height: 30px" src="smile_cat.png"/>', $value->message);

    echo '<p><strong>'.htmlspecialchars($value->pseudo).'</strong>: '.$value->message.'</p>';
}
?>


                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <strong><?php /* TODO */ ?></strong> <?php /* TODO */ ?>
                        </span>
                    </li>
<?php
// }
// ...
?>
                </ul>

                <form action="post.php" class="mdl-grid" method="POST">
                    <div class="mdl-cell mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="pseudo" id="pseudo" value="<?php echo $pseudocookie; ?>">
                        <label class="mdl-textfield__label" for="sample3">Pseudo</label>
                    </div>
                    <div class="mdl-cell mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="message" id="message">
                        <label class="mdl-textfield__label" for="sample3">Message</label>
                    </div>
                    <button id="send" class="mdl-cell mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                        <i class="material-icons">send</i>
                    </button>
                </form>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script language="javascript">
        setTimeout(function(){
            window.location.reload(1);
        }, 30000);

    </script>
    <!-- Material Design Light -->
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</body>

</html>
