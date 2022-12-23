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
$description = ''; 
if( isset( $_POST['description'])) {
    $description = $_POST['description']; 
} 
$visibilite = ''; 
if( isset( $_POST['visibilite'])) {
    $visibilite = $_POST['visibilite']; 
} 
$IdCreateur = $getid;

$nbTable = ''; 
if( isset( $_POST['nbTable'])) {
    $nbTable = $_POST['nbTable']; 
} 

$Statut1 = ''; 
if( isset( $_POST['Statut1'])) {
    $Statut1 = $_POST['Statut1']; 
} 

$Statut2 = ''; 
if( isset( $_POST['Statut2'])) {
    $Statut2 = $_POST['Statut2']; 
} 

$Statut3 = ''; 
if( isset($_POST['Statut3'])) {
    $Statut3 = $_POST['Statut3']; 
} 

//$Statut3 = $Statut3 == '' ? 'NULL':"'".$Statut3."'";
echo $Statut3;
$sql = "INSERT INTO kanban(titre,description,visibilite,IdCreateur,nbTable, Statut1, Statut2, Statut3) VALUES 
('$titre','$description','$visibilite','$getid','$nbTable', '$Statut1', '$Statut2', '$Statut3');";
 $req = $mysqlClient->query($sql);
 header("location:../createKanban.php?Id=".$getid." ");

    }
?>
          
	
