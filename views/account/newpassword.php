<section class="accueil">

    <?php if(isset($_SESSION['user'])): ?>
        <div class="account-frame">
            <img class="avatar-img" src="<?= $_SESSION['avatar'] ?>" alt="avatar-utilisateur">
            <h1 class="center"><span> <?= $users['first_name'] ?> <?= $users['last_name'] ?></span></h1>
        </div>

        <form class="login" method="POST">
            <h2>Changer le mot de passe</h2>
            <label for="password">Ancien mot de passe</label>
            <input name="password" id="password" type="password">
            <label for="new_password">Nouveau mot de passe</label>
            <input name="new_password" id="new_password" type="password">
            <button class="gray-btn" type="submit">Enregistrer</button>
        </form>
        
    <?php endif; ?>     


</section>