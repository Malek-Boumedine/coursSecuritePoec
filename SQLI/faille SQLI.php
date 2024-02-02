<?php

if(isset($_POST['signin'])){
    $pdo = new PDO("mysql:host=localhost;dbname=securite", 'root', '6RHXPbxb');
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];

    $selectall = $pdo->query("SELECT * FROM user WHERE login='$login' AND pwd='$pwd'");
    $result = $selectall->fetch();
    $counttable = count((is_countable($result)?$result:[]));
    if($counttable!= 0){
        echo 'connexion réussie';
    }
    else{
        echo 'utilisateur non reconnu';
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Injection SQL</title>
</head>
<body>
    <h1>SQL Injection </h1>

    <form method="post" action="#">
        <!-- <label for="login">Login : </label> -->
        Login : <input type="text" name="login">
        <br><br>
        <!-- <label for="password">Password : </label> -->
        Password : <input type="password" name="pwd">
        <br><br>
        <input type="submit" value = 'Sign in' name = signin>
        <!-- <button type="submit">Se connecter</button> -->
    </form>

    <p>maintenant on essaye le code suivant dans le login : 'OR 1=1 OR 1='</p>
</body>
</html>




