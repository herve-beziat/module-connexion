<?php 

include('connect.php') ;

// Je récupère toutes les données de la table utilisateurs
$request = "SELECT * FROM utilisateurs";
$query= $mySqli->query($request);
$users= $query->fetch_all();


if (isset($_POST['submit'])) {      

    echo "submit validé <br />";

    

    if(!empty($_POST["login"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["password"]) && !empty($_POST["cpassword"])){
        $login=$_POST["login"];
        $prenom=$_POST["prenom"];
        $nom=$_POST["nom"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
             
            if ($password == $cpassword){

                $loginok=false;

                foreach ($users as $user){
                    if ($_POST["login"] == $user[1]){
                        $loginok=false;
                    }else{
                        $loginok = true;
                    }
                }

                if($loginok==true){
                $add ="INSERT INTO `utilisateurs` (`login`,`prenom`,`nom`,`password`) VALUES ('$login','$prenom','$nom','$password')";
                $request = $mySqli->query($add);
            
                echo "inscription validée<br />";
                header("location:connexion.php");    
                }else {
                    echo "Le login est déjà pris";
                }
        }else {
            echo "Inscription impossible, Mot de passe différent <br />";
        }



    }else {
        echo "Inscription impossible, Veuillez remplir tout les champs. <br />";
    }

}
?> 

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./inscription.css">
</head>
    
<body>
  
<?php include('header.php') ?>


<main id="container">
    <form action="" method="post" class="formulaire">
        <h1>Inscription</h1>

        <label for="login">Login: </label>
        <input type="text" name="login" id="login">

        <label for="prenom">Prénom: </label>
        <input type="text" name="prenom" id="prenom">

        <label for='nom'>Nom: </label>
        <input type='text' name='nom' id='nom'>

        <label for='password'>Password: </label>
        <input type='password' name='password' id='Password'>

        <label for='cpassword'>Confirm Password: </label>
        <input type='password' name='cpassword' id='cpassword'>

        <input type="submit" name="submit" value="Créer">
    </form> 

</main>

    <?php include('footer.php') ?>

</body>
</html>