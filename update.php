<?php

    try {
        $iconn = new PDO("mysql:host=localhost; dbname=gestion_etudiants", "root", '');
        $iconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur connexion".$e -> getMessage();
}
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = trim($_GET['id']);
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $age = trim($_POST['age']);
            $tel = trim($_POST['tel']);
            
if (!empty($nom) && !empty($prenom) && !empty($age) && !empty($tel)) {
    $sql_update = $iconn -> prepare("UPDATE etudiant SET nom=:nom, prenom=:prenom, age=:age, tel=:tel WHERE id=:id");
            $sql_update -> execute([
                ':nom'=> $nom,
                ':prenom'=> $prenom,
                ':age'=> $age,
                ':tel'=> $tel,
                ':id'=> $id
            ]
            ) ;
}   
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update|Student </title>
</head>

<body>
    <form action="" method="POST">
        <label for="nom">Name</label>
        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom">
        <br>
        <label for="prenom">Surname</label>
        <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom">
        <br>
        <label for="tel">Phone</label>
        <input type="tel" name="tel" id="tel" placeholder="Num..de Telephone..">
        <br>
        <label for="age">Old</label>
        <input type="number" name="age" id="age" placeholder="Entrez votre age">
        <br>
        <input type="submit" value="Update">
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