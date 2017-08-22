<?php
// Connexion à la base de données
/* TODO */
include("connect.php");


if ($_POST) {
    // Insertion du message à l'aide d'une requête préparée
    /* TODO */
}
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
// Récupération des 10 derniers messages
$reponse2 = $pdo->query('SELECT pseudo, message FROM chat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

$reponse3 = $reponse2->fetchAll();
// var_dump($reponse1);
foreach ($reponse3 as $value) {
    echo '<p><strong>'.htmlspecialchars($value->pseudo).'</strong>: '.htmlspecialchars($value->message).'</p>';
}

//
//while ($donnees = $reponse->fetch())
//
//{
//    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
//}


//$reponse->closeCursor();
?>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <strong><?php /* TODO */ ?></strong>: <?php /* TODO */ ?>
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
