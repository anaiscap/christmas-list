<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Christmas List Project</title>
    <link rel="stylesheet" media="screen" href="assets/css/style.css">
    <link rel="stylesheet" media="print" href="assets/css/print.css" />
    <link href="http://fonts.cdnfonts.com/css/candy-cane" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Emilys+Candy&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/brands.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/solid.min.css">
    <!--Print JS-->
    
</head>
<body class="standard">
    <header>

      <nav class="right">
        <div class="flex-row">
          <div>
            <a href="home">
              <img class="logo ld ld-jingle" src="assets/img/logo-yellow.png"/>
            </a>
          </div>

          <div class="navi-link">
            
            <?php if(isset($_SESSION['user'])): ?>
              <div id="mySidenav" class="sidenav">
                <a id="closeBtn" href="#" class="close">&times;</a>
                <div class="sidenav-content">
                  <a class="hover-link-animation" href="account"><img class="avatar-img" src="<?= $_SESSION['avatar'] ?>" alt=""></a>
                  <a class="hover-link" href="home">Accueil</a>
                  <a class="hover-link" href="index.php?route=mylists&id_user=<?= $_SESSION['idUser'] ?>">Mes Listes</a>
                  <a class="hover-link" href="lists">Listes de mes amis</a>
                  <a class="hover-link" href="displayBooking">Mes cadeaux</a>
                  <a class="hover-link" href="home#usersearch">Chercher mes amis</a>
                  <a class="hover-link" href="index.php?route=signin&action=deco">Log out</a>
                </div>
                
              </div>

              <a href="#" id="openBtn">
                <span class="burger-icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
              </a>
              <div class="desktop">
              <a class="hover-link" href="index.php?route=mylists&id_user=<?= $_SESSION['idUser'] ?>">Mes Listes d'envies</a>
              <a class="hover-link" href="lists">Listes de mes amis</a>
              <a class="hover-link" href="displayBooking"><img class="navicon" src="assets/img/gift1.png" alt=""></a>
              <a class="hover-link" href="home#usersearch"><img class="navicon" src="assets/img/addfriend2.png" alt=""></a>
              <a class="hover-link-animation" href="account"><img class="avatar-img" src="<?= $_SESSION['avatar'] ?>" alt=""></a>
              <a class="hover-link" href="index.php?route=signin&action=deco">Log out</a>
              </div>
                <!--  <div class="dropdown">
                      <a href="#" class="deroulant"><i class="fas fa-user"></i><span> <?= $_SESSION['user'] ?></span></a>
                      
                      <p><a class="hover-link-animation" href="account"><img class="avatar-img" src="" alt=""></a></p>
                      <a href="index.php?route=signin&action=deco">Log out</a>

                    </div>	-->

              <?php elseif(isset($_SESSION['admin'])): ?>
                <p><?= $_SESSION['admin'] ?></p>
              <a class="hover-link" href="index.php?route=signin&action=deco">Log out</a>
              <a class="hover-link" href="index.php?route=tableau">Dashboard</a>
            
              <?php else: ?>
                      <a class="hover-link" href="signin"> Connexion </a>
                      <a class="hover-link" href="signup"> Inscription</a>
              <?php endif; ?>
          </div>
        </div>
      </nav>
    </header>
        
        <main id="mainid">
            <?php include_once $view; ?>
        </main>
   <!-- <script type="text/javascript" src='assets/js/stars.js'></script>-->
   <link rel="stylesheet" href="assets/js/GlowCookies-master/src/glowCookies.css" />
    <script src="assets/js/GlowCookies-master/src/glowCookies.js"></script>
   <script type="text/javascript" src='assets/js/main.js'></script>
   <script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <footer>
      <div class="footer">
    <div class="container">
    </div>
        <div class="center list-details">
          <p>Mentions Légales</p>
          <p>-</p>
          <p>Politiques de confidentialité</p>
        </div>

        
      </div>
        
    </footer>
   
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>