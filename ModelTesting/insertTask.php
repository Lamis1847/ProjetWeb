<?PHP
    try
    {
        // On se connecte à MySQL
        $mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web', 'root', '');
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


$userName = ''; 
if( isset( $_POST['userName0'])) {
    $userName = $_POST['userName0']; 
} 
$req1 = $mysqlClient->query("SELECT Id FROM user WHERE userName = '$userName'");
$var1 = $req1->fetch();
$IdUser = $var1['Id'];

$taskTitle = ''; 
if( isset( $_POST['taskTitle'])) {
    $taskTitle = $_POST['taskTitle']; 
} 

$status = ''; 
if( isset( $_POST['status'])) {
    $status = $_POST['status']; 
} 
$description = ''; 
if( isset( $_POST['description'])) {
    $description = $_POST['description']; 
} 
$dateLimite = ''; 
if( isset( $_POST['dateLimite'])) {
    $dateLimite = $_POST['dateLimite']; 
}

$sql = "INSERT INTO tache(titre, description, IdKanban, idUser, dateLimite, status) VALUES 
    ('$taskTitle', '$description','$Idkanban','$IdUser', '$dateLimite', '$status');";
$req = $mysqlClient->query($sql);



 header("location:addTask.php?Id=".$getid." ");

}
?>
          
	
