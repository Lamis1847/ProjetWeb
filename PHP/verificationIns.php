<?php
$dsn="mysql:dbname=projet_web; host=127.0.0.1;";
try{
  $pdo=new PDO($dsn,"root","");
}
catch(PDOException $ex){
  printf("erreur de connexion à la base de donnée", $ex->getMessage());
  exit();
}


$nom = ''; 
if( isset( $_POST['nom'])) {
    $nom = $_POST['nom']; 
} 
$prenom = ''; 
if( isset( $_POST['prenom'])) {
    $prenom = $_POST['prenom']; 
} 
$email = ''; 
if( isset( $_POST['email'])) {
    $email = $_POST['email']; 
} 
$userName = ''; 
if( isset( $_POST['userName'])) {
    $userName = $_POST['userName']; 
}
$motDePasse = ''; 
if( isset( $_POST['motDePasse'])) {
    $motDePasse = $_POST['motDePasse']; 
} 

$numero = ''; 
if( isset( $_POST['numero'])) {
    $numero = $_POST['numero']; 
} 
//$hashed_password = crypt($motDePasse);
//$mdp=crypt($motDePasse, $hashed_password);
$sql = "INSERT INTO user (nom,prenom,email,userName,motDePasse,numero) VALUES 
('$nom','$prenom','$email','$userName','$motDePasse','$numero');";
 $req = $pdo->query($sql);
header("location:../login.php");

?>