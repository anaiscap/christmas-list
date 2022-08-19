<section class="accueil">

    <?php if(isset($_SESSION['user'])): ?>
        <div class="account-frame">
            <img class="avatar-img" src="<?= $_SESSION['avatar'] ?>" alt="avatar-utilisateur">
            <h1 class="center"><span> <?= $_SESSION['user'] ?></span></h1>
        </div>
    <?php endif; ?>     
    
    <div class="account">
        <div>
            <div class="center gift">
                <a href="index.php?route=mylists&id_user=<?= $_SESSION['idUser'] ?>">
                    <img class="icon" src="assets/img/list-icon.png" alt="icone-liste">
                    <h2>Mes listes</h2>
                </a>
            </div>
            <div class="center gift">
                <a href="lists">
                    <img class="icon" src="assets/img/friend-list.png" alt="liste-amis">
                    <h2>Les listes de mes amis</h2>
                </a>
            </div>
            
        </div>
        <div>
            <div class="center gift">
                <a href="displayBooking">
                    <img class="icon" src="assets/img/gift3.png" alt="icone-liste">
                    <h2>Mes cadeaux</h2>
                </a>
            </div>
            <div class="center gift">
                <a href="#">
                    <img class="icon" src="assets/img/gears.png" alt="liste-amis">
                    <h2>Mes paramètres</h2>
                </a>
            </div>
        </div>

    </div>



</section>