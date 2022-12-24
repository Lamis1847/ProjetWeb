<?php
try {
    // On se connecte à MySQL
    //pour le deploiment
    $mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web', 'root', '');
    //pour local 
    //$mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web', 'root', '');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
 ?>