<?php 

include('connect.php') ;

$message='';


if (isset($_POST['submit'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
        if (!empty($login) && (!empty($password))){
        }else {
            echo "veuillez renseigner votre login et votre mot de passe <br />";
        }




// Je récupère toutes les données login 
$request = "SELECT * FROM utilisateurs WHERE login= '$login'";
$query = mysqli_query($mySqli, $request);
$users = mysqli_fetch_array($query, MYSQLI_ASSOC);


    
        
            if ($users) {
                if ($password == $users['password']) {

                $_SESSION['login'] = $login;
                header("Location: profil.php");
                die();
                } else {
                echo "Mot de Passe invalide<br />";
                }
            } else {
            echo "Le Login n'existe pas - Veuillez vous créer un compte <br />";
            }

    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="stylesheet" href="./footer.css">
</head>
<body>
<?php include('header.php') ?>

<section id="container">
    <form action="" method="post" class="formulaire">
        <h1>Connexion</h1>
        

        <label for="login"></label>
        <input type="text" name='login' id="login" placeholder="Login">

        <label for='password'></label>
        <input type='password' name='password' id='password' placeholder="Password">


        <input type="submit" name ="submit" value="Se connecter">
    </form> 
</section>
    
    <?php include('footer.php') ?>
    
</body>
</html>