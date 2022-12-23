<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=projet', 'projet', 'tejorp');

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = $_POST['mdpconnect'];
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
     /* $hashed_password = crypt($mdpconnect);
      $verifymdp = crypt($mdpconnect, $hashed_password);*/
      $requser = $bdd->prepare("SELECT * FROM user WHERE userName = ? AND motDePasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      echo $userexist;
      if($userexist == 1){
         $userinfo = $requser->fetch();
         $_SESSION['Id'] = $userinfo['Id'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['email'] = $userinfo['email'];
         header("Location: ../userPage.php?Id=".$_SESSION['Id']);
      } 
      else{
      
         echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
      }
   } else {
      echo "<p style='color:red'>Tous les champs doivent être complétés !</p>";
     
   }
  
   
}
?>
