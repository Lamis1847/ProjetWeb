<?php
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web', 'root', '');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
if (isset($_GET['Id']) and $_GET['Id'] > 0) {
    $getid = intval($_GET['Id']);
    $requser = $mysqlClient->prepare('SELECT * FROM user WHERE Id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Kanban project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../css/index.css" rel="stylesheet" type="text/css" media="screen">
        <title>Kanban</title>

    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">kanban projet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <a type="button" class="btn btn-success mr-2" href="deconnexion.php">Se déconnecter</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='../userPage.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Kanban</a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='../userKanban.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Mes Kanbans</a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='../kanbanpartagés.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Kanbans partagés avec moi</a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='../createKanban.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Créer des Kanbans </a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='ModelTesting/InviteUser.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                             Inviter des utilisateurs </a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='../taches.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Mes taches </a>";
                                ?>
                            <li class="nav-item">
                            <?php
                            echo "<a class='nav-link' href='../tachesglobales.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Mes taches globales</a>";
                         ?>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4.6 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Inviter des utilisateurs</h1>
                    </div>
                    <div class="row row-content">
                        <form id ="inserUserForm" enctype="multipart/form-data" method="post" <?php echo "action= 'insertParticipant.php?Id=" . $getid . " ' "; ?>>
                        <?php } ?>    
                            <div class="form-row" id="titlerow">
                                <div class="form-group col-md-4">
                                    <label for="inputTitle">Titre</label>
                                    <input type="text" class="form-control" id="inputTitle" placeholder="kanban titre" name="titre">
                                </div>
                            </div>
                            <div class="form-row" id="titlerow">
                                <div class="form-group col-md-3">
                                    <label for="lastName0">Nom</label>
                                    <input type="text" class="form-control" id="lastName0" placeholder="Nom" name="userLastName0">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="firstName">Prenom</label>
                                    <input type="text" class="form-control" id="firstName0" placeholder="prenom" name="userfirstName0">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="userName0">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" id="userName0" placeholder="nom d'utlisateur" name="userName0">
                                </div>
                                <div class="col-md-2 mb-3 align-self-end">
                                    <button type="button" class="btn btn-outline-dark" id="addLocal" onclick="addNewForm()"><span data-feather="plus-circle"></span></button>
                                </div>
                            </div>
                            <div id="divUserForm">
                            </div>
                            <div class="form-row" id="titlerow">
                                <div class="form-group col-md-3">
                                    <label for="userCount">Nombre des utilisateurs</label>
                                    <input type="number" class="form-control" id="userCount" placeholder="0" name="userCounts" disabled>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="row row-content">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2">
                            <h1 class="h3">Liste des utilisateurs</h1>
                        </div>
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">nom d'utilisateur</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="row row-content d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" name="send" form="inserUserForm">Enregistrer</button>
                    </div>
                </main>
            </div>
        </div>
        <script type="text/javascript" src="../javaScript/code.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
    </body>

    </html>