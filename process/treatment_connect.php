<?php

require_once("../process/connect_db.php");
// var_dump($_POST["pseudo"]);

session_start();


if (isset($_POST["pseudo"]) && !empty($_POST["pseudo"])){


    $pseudo = $_POST["pseudo"];
    $_SESSION['pseudo']= $pseudo;
    var_dump($pseudo);
    $request = $database->query("SELECT id FROM user WHERE pseudo = '$pseudo' ");
        $pseudoexist = $request->fetch();
        
if (!$pseudoexist) {
    $request = $database->prepare("INSERT INTO user (pseudo) VALUES (:pseudo)");
       $resultat = $request->execute([
           'pseudo' => $_POST['pseudo'],
        ]);
    
};

}
    
   header("Location: ../pages/user.php");




?>