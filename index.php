<?php
//VERIFICATION DE LA METHODE LORS DE LA SOUMISSION

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $tel = trim($_POST['tel']);
    $age = trim($_POST['age']);
    if ($nom == "") {
        $erreur_nom = "Veuillez entrez le nom";
    }
    if ($prenom == "") {
        $erreur_prenom = "Veuillez entrez le prenom";
    }
    if ($age == "") {
        $erreur_age = "Veuillez entrez l'age";
    }
    if ($tel == "") {
        $erreur_tel = "Veuillez entrez le numero de telephone";
    }
}
try {
    $iconn = new PDO("mysql:host=127.0.0.1; dbname=gestion_etudiants; charset=utf8mb4", "root", "");
    $iconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erreur connexion".$e->getMessage();
}

if (!empty($nom) && !empty($prenom) && !empty($age) && !empty($tel)) {
    $sql = $iconn -> prepare("INSERT INTO etudiant(nom, prenom, tel, age) VALUES(?, ?, ?, ?)") ;
    $sql -> execute([
                $nom,
                $prenom,
                $tel,
                $age
            ]
            ) ;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up|Student </title>
</head>

<body>
    <form action="index.php" method="POST">
        <label for="nom">Name</label>
        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom">
        <?php if (isset($erreur_nom)) { ?>
            <i><?php echo $erreur_nom ?></i>
        <?php } ?>
        <br>
        <label for="prenom">Surname</label>
        <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom">
        <?php if (isset($erreur_prenom)) { ?>
            <i><?php echo $erreur_prenom ?></i>
        <?php } ?>
        <br>
        <label for="tel">Phone</label>
        <input type="tel" name="tel" id="tel" placeholder="Num..de Telephone..">
        <?php if (isset($erreur_tel)) { ?>
            <i><?php echo $erreur_tel ?></i>
        <?php } ?>
        <br>
        <label for="age">Old</label>
        <input type="number" name="age" id="age" placeholder="Entrez votre age">
        <?php if (isset($erreur_age)) { ?>
            <i><?php echo $erreur_age ?></i>
        <?php } ?>
        <br>
        <input type="submit" value="Save">
    </form>
</body>
<style>
    i {
        color: red;
        font-size: 15px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    input {
        padding: 7px;
        margin: 4px;
        border-radius: 8px;
        width: 100%;
        font-size: 15px;
        font-weight: 7700;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    label {
        margin-right: 12px;
        font-size: 19px;
        font-weight: 700;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    form {
        justify-content: center;
        width: 30%;
    }
</style>

</html>