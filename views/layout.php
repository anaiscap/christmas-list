<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Christmas List Project</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="http://fonts.cdnfonts.com/css/candy-cane" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Emilys+Candy&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/brands.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/solid.min.css">
</head>
<body>
    <header>

      <nav class="right">
        <div class="flex-row">
          <div>
            <a href="home">
              <img class="logo ld ld-jingle" src="assets/img/logo.png"/>
            </a>
          </div>

          <div class="navi-link">
            <?php if(isset($_SESSION['user'])): ?>
              <a class="hover-link" href="index.php?route=mylists&id_user=<?= $_SESSION['idUser'] ?>">Mes Listes</a>
              <a class="hover-link" href="lists">My subscriptions</a>
              <a class="hover-link" href="displayBooking">My gifts</a>
              <a class="hover-link-animation" href="account"><img class="avatar-img" src="<?= $_SESSION['avatar'] ?>" alt=""></a>
              <a class="hover-link" href="index.php?route=signin&action=deco">Log out</a>
                  <!-- <div class="dropdown">
                      <a href="#" class="deroulant"><i class="fas fa-user"></i><span> <?= $_SESSION['user'] ?></span></a>
                      
                      <p><a class="hover-link-animation" href="account"><img class="avatar-img" src="" alt=""></a></p>
                      <a href="index.php?route=signin&action=deco">Log out</a>

                    </div>	-->
              <?php else: ?>
                      <a class="hover-link" href="signin"> Connexion </a>
                      <a class="hover-link" href="signup"> Inscription</a>
              <?php endif; ?>
          </div>
        </div>
      </nav>
    </header>
        
        <main>
            <?php include_once $view; ?>
        </main>
    
    
   <!-- <script type="text/javascript" src='assets/js/stars.js'></script>-->
   <script type="text/javascript" src='assets/js/main.js'></script>
    <footer>
      <div class="footer container2">
        <div class="center list-details">
          <p>Mentions Légale</p>
          <p>-</p>
          <p>Politiques de confidentialité</p>
        </div>
        
      <img src="assets/img/snow-footer.png" alt="snow-christmas">

        
      </div>
        
    </footer>
     
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>