<?PHP
    try
    {
        // On se connecte à MySQL
        $mysqlClient = new PDO('mysql:host=localhost;dbname=projet', 'projet', 'tejorp');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
    
	if(isset($_GET['Id']) AND $_GET['Id'] > 0) {
        $getid = intval($_GET['Id']);
        $requser = $mysqlClient->prepare('SELECT * FROM user WHERE Id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
    
$titre = ''; 
if( isset( $_POST['titre'])) {
    $titre = $_POST['titre']; 
} 
$req2 = $mysqlClient->query("SELECT Id FROM kanban WHERE titre = '$titre'");
$var2 = $req2->fetch();
$Idkanban = $var2['Id'];
$userCounts = ''; 
if( isset( $_POST['userCounts'])) {
    $userCounts = $_POST['userCounts']; 
}
$userName = ''; 
$userCounts += 1;
for ($i = 0; $i <= $userCounts; $i++) {

    $userName = $_POST["userName{$i}"];
    //echo  $userName;
    $req1 = $mysqlClient->query("SELECT Id FROM user WHERE userName = '$userName'");
    $var1 = $req1->fetch();
    $Iduser = $var1['Id'];
    $sql = "INSERT INTO participant(Iduser, IdKanban) VALUES 
    ('$Iduser','$Idkanban');";
    $req = $mysqlClient->query($sql);

}


 header("location:InviteUser.php?Id=".$getid." ");

}
?>
          
	
