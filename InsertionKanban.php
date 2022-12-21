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
     /*   
    if(empty($_POST["send"])) {
        $titre = $_POST["titre"];
        $visibilite= $_POST["visibilite"];
        $nbTable = $_POST["nbTable"];
        $description = $_POST["description"];
        $IdCreateur = $getid;
        echo $description;
     $stmt = $mysqlClient->prepare('INSERT INTO kanban(titre,
     visibilite, nbTable, description, IdCreateur) VALUES(:titre,
     :visibilite, :nbTable, :nbTable, :description, :IdCreateur)');
     $stmt->execute(array(
     'titre' => $titre,
     'description' => $description,
     'visibilite' => $visibilite,
     'IdCreateur' => $IdCreateur,
     'nbTable' => $nbTable
     ));
     }
 //header("location:createKanban.php?Id=".$getid." ");
    }*/

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
 header("location:createKanban.php?Id=".$getid." ");

    }
?>
          
	
