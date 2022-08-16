<section class="accueil">

    <?php if(isset($_SESSION['user'])): ?>
        <img class="avatar-img" src="<?= $_SESSION['avatar'] ?>" alt="avatar-utilisateur">
        <h1 class="center">Bienvenue sur la page compte de <span> <?= $_SESSION['user'] ?></span> !</h1>
    <?php endif; ?>     
    
    <div class="account">
        <div class="center">
            <img class="icon" src="assets/img/list-icon.png" alt="icone-liste">
            <h2>Mes listes</h2>
        </div>
        <div class="center">
            <img class="icon" src="assets/img/friend-list.png" alt="liste-amis">
            <h2>Les listes de mes amis</h2>
        </div>
        <div class="center">
            <img class="icon" src="assets/img/gift3.png" alt="icone-liste">
            <h2>Mes cadeaux</h2>
        </div>
        <div class="center">
            <img class="icon" src="assets/img/gears.png" alt="liste-amis">
            <h2>Mes paramètres</h2>
        </div>

    </div>



</section>