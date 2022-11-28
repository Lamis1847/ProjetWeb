<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kanban login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="../css/login.css" rel="stylesheet">
  </head>
  <body>
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
              class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="post" action="verificationIns.php">
                <!-- Firstname input -->
                <div class="form-outline mb-4">
                <input type="text" id="firstNameAuth" class="form-control form-control-lg"
                  placeholder="Nom" name="nom" />
                  
              </div>
                <!-- Lastname input -->
                <div class="form-outline mb-4">
                <input type="text" id="lastNameAuth" class="form-control form-control-lg"
                  placeholder="Prénom" name="prenom" />
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="emailNameAuth" class="form-control form-control-lg"
                  placeholder="Adresse mail" name="email"/>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="userNameAuth" class="form-control form-control-lg"
                  placeholder="Nom d'utilisateur" name="userName"/>
              </div>
    
              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" id="PasswordAuth" class="form-control form-control-lg"
                  placeholder="Mot de passe" name="motDePasse"/>
              </div>

              <div class="form-outline mb-3">
                <input type="password" id="PasswordAuthConf" class="form-control form-control-lg"
                  placeholder="Confirmer le mot de passe" />
              </div>
               <!-- Phone number input -->
              <div class="form-outline mb-3">
                <input type="text" id="PhoneAuth" class="form-control form-control-lg"
                  placeholder="Numéro de téléphone" name="numero"/>
              </div>
    
              <div class="text-center mx-auto mt-4 pt-2">
              <input id="connect" type="submit" name="send" value="S'authentifier "/>
              </div>  
            </form>
          </div>
        </div>
      </div>
      <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
        <!-- Copyright -->
        <div class="text-white mx-auto mb-3 mb-md-0 align-items-center">
          Copyright © 2022. tous les droits sont réservés.
        </div>
        <!-- Copyright -->
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
