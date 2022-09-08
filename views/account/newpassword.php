<section class="accueil">

    <?php if(isset($_SESSION['user'])): ?>
        <div class="account-frame">
            <img class="avatar-img" src="<?= htmlspecialchars($_SESSION['avatar']) ?>" alt="avatar-utilisateur">
            <h1 class="center"><span> <?= htmlspecialchars($user['first_name'] .' '. $user['last_name']); ?></span></h1>
        </div>
        <div class="sign-up">
            <form class="log-in" method="POST">
                <h2>Changer le mot de passe</h2>
                <p><label for="pw">Ancien mot de passe</label>
                <input name="pw" id="pw" type="password"></p>
                <p><?= $this -> message2 ?></p>
                <p><label for="new_password">Nouveau mot de passe</label>
                <input name="new_password" id="new_password" type="password"></p>
            
                <button class="gray-btn" type="submit">Enregistrer</button>
            </form>
        </div>
    <?php endif; ?>     


</section>