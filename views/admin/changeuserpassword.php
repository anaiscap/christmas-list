<section class="accueil">

    <?php if(isset($_SESSION['admin'])): ?>
        
        <div class="sign-up">
            <form class="log-in bg-white" method="POST">
                <img class="avatar-img" src="<?= htmlspecialchars($avatarsrc['avatar_src']) ?>" alt="">
                <p><?= htmlspecialchars($users['first_name']) ?> <?= htmlspecialchars($users['last_name']) ?></p>
                <input name="avatar" id="avatar" type="hidden" value="<?= htmlspecialchars($users['avatar']) ?>">
                <input name="first_name" id="first_name" type="hidden" value="<?= htmlspecialchars($users['first_name']) ?>">
                <input name="last_name" id="last_name" type="hidden" value="<?= htmlspecialchars($users['last_name']) ?>">
                <input name="email" id="email" type="hidden" value="<?= htmlspecialchars($users['email']) ?>">
                <p><label for="new_password">Nouveau mot de passe</label>
                <input name="new_password" id="new_password" type="password"></p>
                <p><?= $this -> $message3 ?></p>
                
                <button class="gray-btn" type="submit">Enregistrer</button>
            </form>
        </div>
    <?php endif; ?>    
    

</section>