<section class="accueil">

    <?php if(isset($_SESSION['user'])): ?>
        <h1>Bienvenue sur la page compte de <span> <?= $_SESSION['user'] ?></span> !</h1>
    <?php endif; ?>     
    
    <div class="account">
        <div>
            <h2>My list</h2>
        </div>
        <div>
            <h2>My subscriptions</h2>
        </div>

    </div>



</section>