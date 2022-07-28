<section class="accueil">

    <?php if(isset($_SESSION['user'])): ?>
        <h1 class="center">Bienvenue sur la page compte de <span> <?= $_SESSION['user'] ?></span> !</h1>
    <?php endif; ?>     
    
    <div class="account">
        <div>
            <h2>Mes listes</h2>
        </div>
        <div>
            <h2>Les listes de mes amis</h2>
        </div>

    </div>



</section>