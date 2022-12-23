<?php
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=projet', 'projet', 'tejorp');
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
        <link href="./css/index.css" rel="stylesheet" type="text/css" media="screen">
        <title>Rendez Vous</title>

    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">kanban projet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <a type="button" class="btn btn-success mr-2" href="PHP/deconnexion.php">Se déconnecter</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='userPage.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Kanban</a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='userKanban.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Mes Kanbans</a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='kanbanpartagés.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Kanbans partagés avec moi</a>";
                                ?>

                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='createKanban.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Créer des Kanbans </a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='./ModelTesting/inviteUser.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Inviter des Utilisateur </a>";
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='taches.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Mes taches </a>";
                                ?>
                            <li class="nav-item">
                                <?php
                                echo "<a class='nav-link' href='ModelTesting/addTask.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                                    Créer une tâche </a>";
                                ?>
                            </li>
                            <li class="nav-item">
                            <?php
                            echo "<a class='nav-link' href='tachesglobales.php?Id=" . $getid . " '>  <span data-feather='home'></span>
                        Mes taches globales</a>";
                        } ?>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-4.6 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Kanban</h1>
                    </div>
                    <?php
                    $sqlQuery = 'SELECT Id, titre, description FROM kanban where visibilite = "public"';
                    $recipesStatement = $mysqlClient->prepare($sqlQuery);
                    $recipesStatement->execute();
                    //$kanbans = $recipesStatement->fetchAll();
                    $table_titre = array();
                    $table_description = array();
                    $table_id = array();
                    while ($kanbans = $recipesStatement->fetch()) {
                        $table_titre[] = $kanbans['titre'];
                        $table_description[] = $kanbans['description'];
                        $table_id[] = $kanbans['Id'];
                    }
                    $number = $recipesStatement->rowCount();

                    ?>
                    <div class="row-content">
                        <div class="card-columns">
                            <?php
                            for ($i = 0; $i < $number; $i++) {
                            ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> <?php echo  '' . $table_titre[$i] . '<br>'; ?> </h5>
                                        <p class="card-text"> <?php echo  '' . $table_description[$i] . '<br>'; ?> </p>
                                    </div>

                                    <div class="card-footer text-white bg-dark">
                                        <div class="btn-toolbar justify-content-end">
                                            <div class="btn-group mr-2">
                                                <?php
                                                echo "<a class='btn btn-sm btn-outline-success' href='ModelTesting/showKanban.php?Id=" . $table_id[$i] . " '> <span data-feather='eye'></span>
                            </a>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>


                        </div>

                </main>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
    </body>

    </html>