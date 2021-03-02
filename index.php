<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fonction d'agrégation</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.

    require "./Classes/DB.php";
    $conn = DB::getInstance();

    $infoUser = $conn->prepare("SELECT min(age) as minimum FROM exo_196.user");
    $infoUser->execute();
    $min = $infoUser->fetch();
    echo "l'age min est de ".$min["minimum"]." ans<br>";

    $infoUser = $conn->prepare("SELECT max(age) as maximum FROM exo_196.user");
    $infoUser->execute();
    $max = $infoUser->fetch();
    echo "l'age max est de ".$max["maximum"]." ans<br>";

    $infoUser = $conn->prepare("SELECT count(*) as nbrUser FROM exo_196.user");
    $infoUser->execute();
    $nbr = $infoUser->fetch();
    echo "il y a ".$nbr["nbrUser"]." utilisateurs<br>";

    $infoUser = $conn->prepare("SELECT count(*) as nbrUser FROM exo_196.user WHERE numero > 5");
    $infoUser->execute();
    $nbr = $infoUser->fetch();
    echo "il y a ".$nbr["nbrUser"]." utilisateurs ayant un numero de rue > 5<br>";

    $infoUser = $conn->prepare("SELECT AVG(age) as avgAge FROM exo_196.user");
    $infoUser->execute();
    $avgAge = $infoUser->fetch();
    echo "la moyenne d'age est de ".$avgAge["avgAge"]." ans<br>";

    $infoUser = $conn->prepare("SELECT sum(numero) as sommeNbr FROM exo_196.user");
    $infoUser->execute();
    $sommeNbr = $infoUser->fetch();
    echo "la somme des num de maison est de ".$sommeNbr["sommeNbr"]."<br>";
    ?>
</body>
</html>

